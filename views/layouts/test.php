<?php  

use yii\helpers\Html;
$this->beginPage();
\app\assets\TestAsset::register($this); // Регистрируем файл ресурсов, где прописаны стили и скрипты, которые используем в проекте

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() // Метод для коррекетной отправки форм: устанавливает токен, чтобы понять, что форма пришла именно с нашего сайта, а не поддельная ?>
    <title><?= Html::encode($this->title) // Метод обеспечивает защиту от xss атак (фильтрует полученные от пользователей данные) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="container">
        <div class="row">
            <?= $content ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
