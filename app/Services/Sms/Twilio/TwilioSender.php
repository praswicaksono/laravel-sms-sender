<?php
declare(strict_types=1);

namespace App\Services\Sms\Twilio;

use App\Services\Sms\SmsInterface;
use Twilio\Rest\Client;

/**
 * Class TwilioSender
 * @package App\Services\Sms\TwilioSender
 */
final class TwilioSender implements SmsInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * TwilioSender constructor.
     * @param Client $twilio
     */
    public function __construct(Client $twilio)
    {
        $this->client = $twilio;
    }

    /**
     * @param string $phoneNumber
     * @param string $message
     */
    public function send(string $phoneNumber, string $message)
    {
        $this->client->messages->create(
            $phoneNumber, // Text this number
            array(
                'from' => 'GiftSelfie', // From a valid Twilio number
                'body' => $message
            )
        );
    }
}
