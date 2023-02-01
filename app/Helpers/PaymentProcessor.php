<?php


namespace App\Helpers;


interface PaymentProcessor
{
    public function charge(array $data);

}
