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
        return 25;
    }
}

class TrainShipping extends ShippingType
{
    public function getCost($Order)
    {
        return 10;
    }
}

class Order
{
    private $shippingType;

    public function __construct($ShippingType)
    {
        $this->shippingType = $ShippingType;
    }

    public function getShippingCost()
    {
        return $this->shippingType->getCost();
    }
}

$TrainShipping = new TrainShipping(); 
$livraison = new Order($TrainShipping);
$cout = $livraison->getShippingCost();
