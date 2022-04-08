<?php


namespace src\strategy;


use src\DeliveryData;

abstract class DeliveryCostStrategy implements ICostStrategy
{
    /**
     * Метод может вернуть как полную стоимость, так и коэфициент (в зависимости от того какой тип доставки выбран)
     * @param DeliveryData $data
     * @return array
     */
    public function costResponse(DeliveryData $data): array
    {
        //Расчет периода доставки
        return [
            'period' => 7 //7 дней
        ];
    }
}