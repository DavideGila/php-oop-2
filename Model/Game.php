<?php
include __DIR__ ."/Product.php";
class Game extends Product
{
    private int $appid;
    private string $name;
    private string $img_icon_url;

    function __construct($appid, $name, $image, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->appid = $appid;
        $this->name = $name;
        $this->img_icon_url = $image;
    }

    public function printGame()
    {
        $gameItem = [
            "image" => $this->img_icon_url,
            "title" => $this->name,
            "content" => "",
            "custom" => "",
            "genre" => "",
            "price" => $this->price,
            "quantity" => $this->quantity
        ];
        return $gameItem;
    }

    public static function fetchAll()
    {
        $gameString = file_get_contents(__DIR__ . '/steam_db.json');
        $gameList = json_decode($gameString, true);
        $games = [];
        foreach ($gameList as $item) {
            $price = rand(5, 200);
            $quantity = rand(0, 100);
            $games[] = new Game($item['appid'], $item['name'], $item['img_icon_url'], $price, $quantity);
        }
        return $games;
    }
}
