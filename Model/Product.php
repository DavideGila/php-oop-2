<?php
class Product 
{
    public float $price;
    public int $quantity;

    function __construct($price, $quantity){
        $this->price = $price;
        $this->quantity = $quantity;
    }       
}
?>