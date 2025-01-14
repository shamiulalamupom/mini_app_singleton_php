<?php

require_once "classes/Database.php";
require_once "classes/Product.php";


$products = Product::findAllProduct();

require_once "templates/header.php";
?>


<h1>Mini PHP App with classes</h1>
<section>

    <?php foreach ($products as $product): ?>
        <article>
            <?php /** @var Product $product */ ?>
            <h2><?=htmlentities($product->getName()); ?></h2>
            <p><a href="product_detail.php?id=<?=htmlentities($product->getId()); ?>">Read More</a></p>
        </article>
    <?php endforeach; ?>
</section>
<?php require_once "templates/footer.php";
