<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Movie.php";
?>

<section class="container">
    <h2>Movie</h2>
    <div class="row">
        <?php
        foreach ($movies as $movie) {
            $movie->printCard();
        }
        ?>
    </div>
</section>

<?php
include __DIR__ . "/Views/footer.php";
?>