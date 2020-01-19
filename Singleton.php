<?php


// Декларация шаблона Singleton
trait Singleton
{
    private function __construct ()
    {
    }
    public static function getInstance ()
    {
        static $instance = null;
        if ( $instance === null ) 
            $instance = new static ();
        return $instance;
    }
    private function __clone ()
    {
    }
    private function __wakeup ()
    {
    }
}