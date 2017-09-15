<?php
declare(strict_types=1);

namespace App\Services\Sms\Twilio;

use App\Services\Sms\SmsInterface;
use Nodes\Services\Twilio\Resources\SmsMessage;

/**
 * Class TwilioSender
 * @package App\Services\Sms\TwilioSender
 */
final class TwilioSender implements SmsInterface
{
    /**
     * @var SmsMessage
     */
    private $client;

    /**
     * TwilioSender constructor.
     * @param SmsMessage $twilio
     */
    public function __construct(SmsMessage $twilio)
    {
        $this->client = $twilio;
    }

    /**
     * @param string $phoneNumber
     * @param string $message
     */
    public function send(string $phoneNumber, string $message)
    {
        $this->client->setToNumber($phoneNumber);
        $this->client->setMessage($message);
        $this->client->send();
    }
}
