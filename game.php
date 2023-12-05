<?php
include __DIR__ . "/Views/header.php";
include __DIR__ ."/Model/Game.php";
$games = Game::fetchAll();
?>

<section class="container">
    <h2>Games</h2>
    <div class="row">
        <?php
            foreach ($games as $game) {
                $game->printCard();
            }
        ?>
    </div>
</section>

<?php
include __DIR__ . "/Views/footer.php";
?>