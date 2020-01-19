<?php

include_once "AbstractGoods.php";

class WeightGoods extends AbstractGoods
{
    public function __construct ( string $name, float $baseCost )
    {
        parent::__construct ( $name, $baseCost );
    }

    public function getInfo () : string
    {
        return $this->name . " по цене " . $this->baseCost . " за килограмм";
    }

    public function calculatePrice ( float $amount ) : float
    {
        return $this->baseCost * floatval ( $amount );
    }
}
