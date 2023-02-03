<?php


namespace App\Helpers\Interfaces;


interface PaymentProcessor
{
    public function charge(array $data);


}
