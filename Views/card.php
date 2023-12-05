<div class="col-12 col-md-4 col-lg-3 g-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $content ?>
            </p>
            <div>
                <?= $custom ?>
            </div>
            <div>
                <?= $genre ?>
            </div>
            <div class="d-flex justify-content-between align-items-flex-start">
                <div>
                    Quantità
                    <?= $quantity ?>
                </div>
                <div>
                    Prezzo 
                    €<?= $price ?>                    
                </div>
            </div>
        </div>
    </div>
</div>