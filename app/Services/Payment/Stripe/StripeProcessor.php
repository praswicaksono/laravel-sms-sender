<?php
declare(strict_types=1);

namespace App\Services\Payment\Stripe;


use App\Services\Payment\PaymentInterface;
use Cartalyst\Stripe\Stripe;

final class StripeProcessor implements PaymentInterface
{
    /**
     * @var Stripe
     */
    private $client;

    /**
     * StripeProcessor constructor.
     * @param Stripe $stripe
     */
    public function __construct(Stripe $stripe)
    {
        $this->client = $stripe;
    }

    /**
     * @param array $params
     */
    public function charge(array $params)
    {
        $token = $this->client->tokens()->create([
            'card' => [
                'number' => $params['cc_number'],
                'cvc' => $params['cc_cvc'],
                'exp_month' => $params['cc_exp_month'],
                'exp_year' => $params['cc_exp_year']
            ],
        ]);

        $this->client->charges()->create([
            'amount' => $params['amount'],
            'currency' => 'USD',
            'source' => $token['id'],
            'metadata' => ['user_id' => $params['user_id']],
            'description' => "Buying {$params['amount']} SMS credit(s)"
        ]);
    }
}
