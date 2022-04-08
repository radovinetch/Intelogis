<?php


namespace src\strategy;


use src\DeliveryData;

class SlowDeliveryStrategy extends DeliveryCostStrategy
{
    const BASE_COST = 150;

    public function costResponse(DeliveryData $data): array
    {
        $coefficient = 1.5; //Расчет коэфициента
        $price = $coefficient * self::BASE_COST;
        $response = parent::costResponse($data);
        $response['price'] = $price;
        $response['coefficient'] = $coefficient;
        return $response;
    }
}