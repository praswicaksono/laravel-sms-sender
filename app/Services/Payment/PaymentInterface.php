<?php
declare(strict_types=1);

namespace App\Services\Payment;

/**
 * Interface PaymentInterface
 * @package App\Services\Payment
 */
interface PaymentInterface
{
    /**
     * @param array $params
     * @return void
     */
    public function charge(array $params);
}
