<?php


namespace src\strategy;


use src\DeliveryData;

interface ICostStrategy
{
    public function costResponse(DeliveryData $data): array;
}