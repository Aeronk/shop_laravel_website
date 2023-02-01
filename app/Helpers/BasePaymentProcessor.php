<?php


namespace App\Helpers;


abstract class BasePaymentProcessor implements PaymentProcessor
{
    abstract public function charge(array $data);

}
