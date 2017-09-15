<?php
declare(strict_types=1);

namespace App\Services\Sms\ArrayRecord;


use App\Services\Sms\SmsInterface;

/**
 * Class ArrayRecordSender
 * @package App\Services\Sms\ArrayRecord
 */
final class ArrayRecordSender implements SmsInterface
{
    /**
     * @var array
     */
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @param string $phoneNumber
     * @param string $message
     */
    public function send(string $phoneNumber, string $message)
    {
        $this->data[] = [$phoneNumber => $message];
    }
}
