<?php
declare(strict_types=1);

namespace App\Services\Sms;

/**
 * Interface SmsInterface
 * @package App\Services\Sms
 */
interface SmsInterface
{
    /**
     * @param string $phoneNumber
     * @param string $message
     * @return void
     */
    public function send(string $phoneNumber, string $message);
}
