<?php

/*
    Класс, описывающий тип доставки.
    Включает в себя общие для всех типов доставок поля.
    Поля address и recipient относятся к владению суперклассом.
    Поле deliveryTime расчитывается классами-потомками в зависимости от типа доставки и его разновидности.
*/

class Delivery
{
    private $address;
    private $recipient;
    private $deliveryTime;

    function __construct ( $address, $recipient )
    {
        $this->address = $address;
        $this->recipient = $recipient;
        $this->deliveryTime = 100;
    }

    protected function setDeliveryTime ( $time )
    {
        $this->deliveryTime = $time;
    }

    public function getAddress ()
    {
        return $this->address;
    }

    public function getRecipient ()
    {
        return $this->recipient;
    }

    public function getDeliveryTime ()
    {
        return $this->deliveryTime;
    }
}

class DeliveryMail extends Delivery
{
    private $format;

    function __construct ( $address, $recipient, $format )
    {
        parent::__construct ( $address, $recipient );
        $this->format = $format;
        if ( $format == "avia" )
            parent::setDeliveryTime ( 1 );
        else
            parent::setDeliveryTime ( 5 );
    }

    public function getFormat ()
    {
        return $this->format;
    }
}

class DeliveryParcel extends Delivery
{
    private $weight;

    function __construct ( $address, $recipient, $weight )
    {
        parent::__construct ( $address, $recipient );
        $this->weight = $weight;
        if ( $weight < 5 )
            parent::setDeliveryTime ( 6 );
        else
            parent::setDeliveryTime ( 8 );
    }

    public function getWeight ()
    {
        return $this->weight;
    }
}
