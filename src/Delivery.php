<?php


namespace src;


use src\strategy\DeliveryCostStrategy;
use src\strategy\FastDeliveryStrategy;
use src\strategy\SlowDeliveryStrategy;

class Delivery
{
    protected DeliveryCostStrategy $strategy;

    protected DeliveryData $data;

    public function __construct(DeliveryCostStrategy $strategy, DeliveryData $data)
    {
        $this->strategy = $strategy;
        $this->data = $data;
    }

    public function calculate(): array
    {
        return $this->strategy->costResponse($this->data);
    }

    public static function fromParams(string $type, string $sourceKladr, string $targetKladr, int $weight): Delivery
    {
        switch ($type) {
            case 'fast':
                $type = new FastDeliveryStrategy();
                break;

            default:
                $type = new SlowDeliveryStrategy();
        }

        return new self($type, new DeliveryData($sourceKladr, $targetKladr, $weight));
    }
}