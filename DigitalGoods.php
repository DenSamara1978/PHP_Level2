<?php

include_once "AbstractGoods.php";

class DigitalGoods extends AbstractGoods
{
    public function __construct ( string $name, float $baseCost )
    {
        parent::__construct ( $name, $baseCost );
    }

    public function getInfo () : string
    {
        return $this->name . " по базовой цене " . $this->baseCost . " за штуку";
    }

    public function calculatePrice ( float $amount ) : float
    {
        $count = intval ( $amount );
        return 0.5 * $this->baseCost * $count;
    }
}
