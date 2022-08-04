<?php
use Order;

abstract class ShippingType
{
    abstract public function getCost(Order $order);
}

class AircraftShipping extends ShippingType
{
    public function getCost($Order)
    {
        /*...*/
    }
}

class TrainShipping extends ShippingType
{
    public function getCost($Order)
    {
        /*...*/
    }
}

class Order
{
    private $shippingType;

    public function __construct($ShippingType)
    {
        $this->shippingType = $shippingType;
    }

    public function getShippingCost()
    {
        return $this->shippingType->getCost();
    }
}