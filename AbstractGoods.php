<?php

abstract class AbstractGoods
{
    protected $name;
    protected $baseCost;
    
    public function __construct ( string $name, float $baseCost )
    {
        $this->name = $name;
        $this->baseCost = $baseCost;
    }

    public function getName () : string
    {
        return $this->name;
    }

    // Возвращает информацию о товаре
    abstract public function getInfo () : string;

    // Расчитывает стоимость по цене товара и задаваемого количества ( штук или кг, л )
    abstract public function calculatePrice ( float $amount ) : float;
}

