<?php


namespace src;


class DeliveryData
{
    private $sourceKladr;

    private $targetKladr;

    private $weight;

    public function __construct(string $sourceKladr, string $targetKladr, float $weight)
    {
        $this->sourceKladr = $sourceKladr;
        $this->targetKladr = $targetKladr;
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getSourceKladr(): string
    {
        return $this->sourceKladr;
    }

    /**
     * @return string
     */
    public function getTargetKladr(): string
    {
        return $this->targetKladr;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }
}