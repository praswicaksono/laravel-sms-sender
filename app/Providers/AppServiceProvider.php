<?php

namespace App\Providers;

use App\Services\Payment\PaymentInterface;
use App\Services\Payment\Stripe\StripeProcessor;
use App\Services\Sms\SmsInterface;
use App\Services\Sms\Twilio\TwilioSender;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SmsInterface::class, TwilioSender::class);
        $this->app->bind(PaymentInterface::class, StripeProcessor::class);

        $this->app->singleton('twilio', function ($app) {
            $config = $app['config']->get('services.twilio');

            return new Client($config['sid'], $config['token']);
        });
        $this->app->alias('twilio', Client::class);
    }
}
