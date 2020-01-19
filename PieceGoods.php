<?php

include_once "AbstractGoods.php";

class PieceGoods extends AbstractGoods
{
    public function __construct ( string $name, float $baseCost )
    {
        parent::__construct ( $name, $baseCost );
    }

    public function getInfo () : string
    {
        return $this->name . " по цене " . $this->baseCost . " за штуку";
    }

    public function calculatePrice ( float $amount ) : float
    {
        $count = intval ( $amount );
        return $this->baseCost * $count;
    }
}
