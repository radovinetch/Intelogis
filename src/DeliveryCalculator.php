<?php


namespace src;


class DeliveryCalculator
{
    public function calculateDelivery(Delivery $delivery): array
    {
        return $delivery->calculate();
    }
}