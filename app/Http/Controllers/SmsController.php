<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SendSmsRequest;
use App\Services\Sms\SmsInterface;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class SmsController
 * @package App\Http\Controllers
 */
final class SmsController extends Controller
{
    private $sms;

    /**
     * SmsController constructor.
     * @param SmsInterface $sms
     */
    public function __construct(SmsInterface $sms)
    {
        $this->sms = $sms;
    }

    public function indexAction()
    {
        return view('app.sms.send');
    }

    public function sendAction(SendSmsRequest $request)
    {
        $user = Auth::user();

        if ($user->sms_credit <= 0) {
            \Alert::error('You credit has been run out, please buy to star send sms again')->flash();
            return redirect()->back();
        }
        $this->sms->send($request['phone_number'], $request['message']);

        $user->sms_credit--;
        $user->save();

        \Alert::success('SMS was sent successfully')->flash();

        return redirect()->back();
    }
}
