<?php
class Genre
{
    private string $name;

    function __construct($name)
    {
        $this->name = $name;
    }
    public function drawGenre()
    {
        return "<span class='badge text-bg-primary'>$this->name</span>";
    }
    public static function fetchAll()
    {

        $genreString = file_get_contents(__DIR__ . '/genre_db.json');
        $genreList = json_decode($genreString, true);

        $genres = [];

        foreach ($genreList as $item) {
            $genres[] = new Genre($item);
        }
        return $genres;
    }
}

?>