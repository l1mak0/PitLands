<?php


/**
 * @var $products
 */
?>

<div class="head">
    <h1><?= $this->title ?></h1>
    <a href="/products/create" class="create-btn btn">+</a>
</div>
<div class="categories">
    <?php foreach ($products as $product): ?>
        <a href='/products/view?id=<?= $product->id ?>' class="col card">
            <div class="card-body" style="background-image: url('/img/product/<?= $product->id ?>.jpg'); background-position: center; background-size: cover">
                <h5 class="card-title"><?= $product->title ?></h5>
            </div>
        </a>
    <?php endforeach;  ?>
</div>

<style>
    .categories {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3,1fr);
        grid-gap: 1rem;
    }
    .head {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }
    .create-btn{
        width: 75px;
        border-radius: 50%;
        aspect-ratio: 1;
        font-size: 1.3rem;
    }
</style>
