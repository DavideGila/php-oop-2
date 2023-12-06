<?php
include __DIR__ . ("/../Traits/DrawCard.php");
class Product 
{
    use DrawCard;
    public float $price;
    public int $quantity;
    private int $sale = 0;

    function __construct($price, $quantity){
        $this->price = $price;
        $this->quantity = $quantity;
    }       

    public function setSale($percentage) {
        if ($percentage < 5 || $percentage > 100) {
            throw new Exception('Your perecentage is out of range.');
        } else {
            $this->sale = $percentage;
        }
    }

    public function getSale()
    {
        return $this->sale;
    }
}
?>