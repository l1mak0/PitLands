<?php
/**
 * @var $product
 * @var $category
 */
?>


<div class="product-card">
    <div class="product-image">
        <img src="/img/product/<?= $product->id ?>.jpg" alt="<?= $product->title ?>">
    </div>
    <div class="product-details">
        <h3 class="product-title"><?= $product->title ?></h3>
        <p class="product-description"><?= $product->description ?></p>
        <div class="product-meta">
            <span class="product-price"><?= $product->price ?>₽</span>
            <span class="product-quantity">Кол-во: <?= $product->quantity ?></span>
            <span class="product-category"><?= $category->title ?></span>
        </div>
        <div class="product-actions">
            <a href="/products/edit?id=<?= $product->id ?>" class="btn edit-btn">Редактировать</a>
            <a href="/products/delete?id=<?= $product->id ?>" class="btn delete-btn">Удалить</a>
        </div>
    </div>
</div>