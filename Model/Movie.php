<?php
include __DIR__ . "/Genre.php";
include __DIR__ . "/Product.php";
class Movie extends Product
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $original_language;

    private array $genres;

    function __construct($id, $title, $overview, $vote, $image, $original_language, $genres, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->original_language = $original_language;
        $this->genres = $genres;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function printMovie()
    {
        $movieItem = [
            "sale" => $this->getSale(),
            "image" => $this->poster_path,
            "title" => strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title,
            "content" => substr($this->overview, 0, 100) . '...',
            "custom" => $this->getVote(),
            "genre" => $this->formatGenres(),
            "price" => $this->price,
            "quantity" => $this->quantity,
        ];
        return $movieItem;
    }
    private function formatGenres()
    {
        $template = "<p>";
        for ($n = 1; $n < count($this->genres); $n++) {
            $template .= $this->genres[$n]->drawGenre();
        }
        $template .= "</p>";
        return $template;
    }

    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star text-warning"></i>' : '<i class="fa-regular fa-star text-dark"></i>';
        }
        $template .= '</p>';
        return $template;
    }
    public static function fetchAll()
    {
        $movieString = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($movieString, true);
        $movies = [];
        $genres = Genre::fetchAll();
        foreach ($movieList as $item) {
            $movie_genres = [];
            for ($i = 0; $i < count($item['genre_ids']); $i++) {
                $index = rand(0, count($genres) - 1);
                $rand_genre = $genres[$index];
                $movie_genres[] = $rand_genre;
            }
            $price = rand(5, 200);
            $quantity = rand(0, 100);
            $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $movie_genres, $price, $quantity);
        }
        return $movies;
    }
}
