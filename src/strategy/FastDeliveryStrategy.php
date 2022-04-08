<?php


namespace src\strategy;


use src\DeliveryData;

class FastDeliveryStrategy extends DeliveryCostStrategy
{
    public function costResponse(DeliveryData $data): array
    {
        $array = parent::costResponse($data);
        $array['price'] = $data->getWeight() * mt_rand(1, 3);
        //Предположим, что тут будут какие-то рассчеты в зависимости от расстояния между КЛАДРами, веса доставки и.т.д
        //От этих данных зависит period и price, но т.к нет механизма расчета данные вставлены на свое усмотрение
        return $array;
    }
}