<?php

namespace App\Providers;

use App\Services\Payment\PaymentInterface;
use App\Services\Payment\Stripe\StripeProcessor;
use App\Services\Sms\SmsInterface;
use App\Services\Sms\Twilio\TwilioSender;
use Illuminate\Support\ServiceProvider;

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
    }
}
