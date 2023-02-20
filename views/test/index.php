<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\widgets\Pjax;
?>

<div class="col-md-12">
    <h1>Страница с формой</h1>

    <!-- < ?= \app\components\HelloWidget::widget(['name' => 'John']); // Выводим наш виджет ?> -->

    <?php \app\components\HelloWidget::begin(['name' => 'John']) ?>
        <h1> Контент виджета: </h1>
    <?php \app\components\HelloWidget::end() ?>

    
    <?php Pjax::begin() ?>
    <?= \app\widgets\Alert::widget() // Используем виджет, чтобы не писать код, который закоментирован ниже ?>

    <!--
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
    -->

    <?php //debug($model) // Распечатываем объект формы model ?>
    <?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'enableClientValidation' => false, // Запрещает клиентскую валидацию данных
        'options' => [
            'class' => 'form-horizontal',
            'data-pjax' => false,
        ],
        'fieldConfig' => [
            'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]) ?>
        
        <?= $form->field($model, 'name'  /*, [
            'template'=>"{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>", 
            'labelOptions' => ['class' => 'col-md-2 control-label'], // Конфигурацию мы вынесли в отдельное свойство fieldConfig выше по коду
        ]*/)->hint('Введите имя')->textInput(['placeholder' => 'Имя'])/*->label('Имя:') Можно задать метки здесь, но мы будем задавать через функцию attributeLabels в модели EntryForm */ ?>
        
        <?= $form->field($model, 'email' /*, [
            'template'=>"{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>", 
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]*/)->input('email', ['placeholder' => 'email']) ?>

        <?= $form->field($model, 'topic', ['enableAjaxValidation' => false])->textInput(['placeholder' => 'Тема']) 
                                            // Включаем ajax-валидацию для элемента Тема
        ?>
                                            

        <?= $form->field($model, 'text' /*, [
            'template'=>"{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>", 
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]*/)->textarea(['rows' => '7', 'placeholder' => 'Текст сообщения'])/*->label('Текст:')*/ ?>
        
        <div class="form-group">
            <div class="col-md-5 col-md-offset-5">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block'] ) ?>
            </div>
       
        </div>
        <?php ActiveForm::end() ?>
    <?php Pjax::end() // Чтобы перезагружалась не вся страница, а только её часть ?>
</div>

<?php


// Валидация асинхронной отправки (AJAX-валидация)
/*
$js = <<<JS
var form = $('#my-form');
form.on('beforeSubmit', function(){
    var data = form.serialize();
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: data,
        success: function(res){
            console.log(res);
            form[0].reset();
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
});
JS;

$this->registerJs($js);

*/

?>




<!--
<?= $this->render('inc') // Подключаем файл .php из той же папки ?>
<?= $this->render('test.html') // Подключаем файл .html из той же папки ?>
<?= $this->render('//inc/test1.html') // Подключаем файл .html из другой папки ?>

<p><?= $name // распечатываем данные, полученные из контроллера ?></p>
<p><?= $age  ?></p>
<p><?= $this->context->my_var // Обращаемся к свойству my_var класса TestController без рендеринга ?></p>
<p><?= $this->params['t1'] // Получаем данные из TestController без рендеринга через свойство params массива view ?></p>

<?php $this->params['t2'] = 'T2 params' // Добавляем параметр в свойство params объекта View ?>
<p><?= $this->params['t2'] // Выводим параметр Т2 свойства params объекта View ?>

<?php debug($this->params) // Распечатаем свойство params объекта View с помощью созданной нами функции debug, созданной в папке libs, подключенной в web/index.php ?>

-->