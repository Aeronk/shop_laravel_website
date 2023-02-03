<?php


namespace App\Helpers;


use App\Helpers\Interfaces\PaymentProcessor;

abstract class BasePaymentProcessor implements PaymentProcessor
{
    abstract public function charge(array $data);

}
