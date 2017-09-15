<?php
declare(strict_types=1);

namespace App\Services\Payment\ArrayPayment;

use App\Services\Payment\PaymentInterface;

/**
 * Class ArrayPaymentProcessor
 * @package App\Services\Payment\ArrayPayment
 */
final class ArrayPaymentProcessor implements PaymentInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * ArrayPaymentProcessor constructor.
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @param array $params
     */
    public function charge(array $params)
    {
        $this->data[] = $params;
    }
}
