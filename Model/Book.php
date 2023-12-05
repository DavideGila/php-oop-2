<?php
include __DIR__ ."/Product.php";
class Book extends Product
{
    private int $_id;
    private string $title;
    private string $isbn;
    private string $thumbnailUrl;
    private string $longDescription;
    private array $categories;

    function __construct($id, $title, $isbn, $image, $description, $categories, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->_id = $id;
        $this->title = $title;
        $this->isbn = $isbn;
        $this->thumbnailUrl = $image;
        $this->longDescription = $description;
        $this->categories = $categories;
    }

    public function printCard()
    {
        $image = $this->thumbnailUrl;
        $title = $this->title;
        $content = substr($this->longDescription, 0, 100) . '...';
        $custom = $this->isbn;
        $genre = $this->getCategories();
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . "/../Views/card.php";
    }

    public function getCategories(){
        $template = "<p>";
        for ($n = 0; $n < count($this->categories); $n++) {
            $template .= $this->categories[$n].' ';
        }
        $template .= "</p>";
        return $template;
    }

    public static function fetchAll()
    {
        $bookString = file_get_contents(__DIR__ . '/books_db.json');
        $bookList = json_decode($bookString, true);
        $books = [];
        foreach ($bookList as $item) {
            $price = rand(5, 200);
            $quantity = rand(0, 100);
            $books[] = new Book($item['_id'], $item['title'], $item['isbn'], $item['thumbnailUrl'], $item['longDescription'], $item['categories'], $price, $quantity);
        }
        return $books;
    }
}
?>