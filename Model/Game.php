<?php
class Game
{
    private int $appid;
    private string $name;
    private string $img_icon_url;

    function __construct($appid, $name, $image)
    {
        $this->appid = $appid;
        $this->name = $name;
        $this->img_icon_url = $image;
    }

    public function printCard()
    {
        $image = $this->img_icon_url;
        $title = $this->name;
        $content = "";
        $custom = "";
        $genre = "";
        include __DIR__ . "/../Views/card.php";
    }

    public static function fetchAll()
    {
        $gameString = file_get_contents(__DIR__ . '/steam_db.json');
        $gameList = json_decode($gameString, true);
        $games = [];
        foreach ($gameList as $item) {
            $games[] = new Game($item['appid'], $item['name'], $item['img_icon_url']);
        }
        return $games;
    }
}
