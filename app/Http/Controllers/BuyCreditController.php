<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BuySmsCreditRequest;
use App\Services\Payment\PaymentInterface;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

final class BuyCreditController extends Controller
{
    private $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
    }

    public function indexAction()
    {
        return view('app.payment.pay');
    }

    public function buyAction(BuySmsCreditRequest $request)
    {
        list($expMonth, $expYear) = explode('/', $request->get('cc_expiration'));

        $params = [
            'amount' => $request->get('amount'),
            'cc_number' => $request->get('cc_number'),
            'cc_cvc' => $request->get('cc_cvc'),
            'cc_exp_month' => $expMonth,
            'cc_exp_year' => $expYear,
            'user_id' => Auth::id(),
        ];

        try {
            $this->payment->charge($params);
        } catch (\Exception $e) {
            \Alert::error($e->getMessage())->flash();
            return redirect()->back()->withInput();
        }

        $user = Auth::user();
        $user->sms_credit += (int) $request->get('amount');
        $user->save();

        \Alert::success("{$request->get('amount')} sms credit successfully added")->flash();
        return redirect()->back();
    }
}
