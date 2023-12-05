<?php
include __DIR__ ."/Genre.php";
include __DIR__ ."/Product.php";
class Movie extends Product
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $original_language;

    public $genre;

    function __construct($id, $title, $overview, $vote, $poster_path, $original_language, $genre)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $poster_path;
        $this->original_language = $original_language;
        $this->genre = $genre;
    }
    
    public function printCard()
    {
        $image = $this->poster_path;
        $title = $this->title;
        $content = $this->overview;
        $custom = $this->getVote();
        $genre = $this->genre;
        include __DIR__ . "/../Views/card.php";
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
}

$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];
$genreString = file_get_contents(__DIR__ . '/genre_db.json');
$genreList = json_decode($genreString, true);
$genres = [];
foreach ($genreList as $genre){
    array_push( $genres, $genre);
}
foreach ($movieList as $item) {
    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $genres[rand(0,count($genres)-1)]);
}
?>