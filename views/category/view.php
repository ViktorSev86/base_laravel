<h4><?= $category->title ?></h4>
<?php foreach($products as $product): //foreach($category->products as $product): ?>
    <p><?= $product->title ?> | <?= $product->price ?></p>
<?php endforeach; ?>

