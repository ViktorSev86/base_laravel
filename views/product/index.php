<?php foreach($products as $product): ?>
    <p><?= $product->title ?> | <?= $product->price ?> | Category: <?= $product->category->title // Вызывает геттер getCategory() из модели Product ?></p>
<?php endforeach; ?>