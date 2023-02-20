<?php foreach($categories as $category): ?>
    <h4><?= $category->title ?></h4>
    <p><?php //debug($category->products) // Свойство products вызывает геттер getProducts() в модели Category ?></p>
    <?php foreach($category->products as $product): ?>
        <p><?= $product->title ?> | <?= $product->price ?></p>
    <?php endforeach; ?>
    
    <hr>
<?php endforeach; ?>