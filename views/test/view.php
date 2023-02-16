<div class="col-md-12">
    <h1>Работа с моделями</h1>
    <?php 
        // debug($model); // Распечатаем модель таблицы country
        // debug($model->getAttributes()); // Распечатаем атрибуты модели - имена столбцов таблицы country
        //debug($countries); // Распечатываем полученный в модели массив объектов - записей таблицы countries 
    ?>
    <table class="table">
        <?php foreach ($countries as $country): ?>
            <tr>
                <td><?= $country['code'] // - для массвов $country->code - для объектов, массивы экономят память ?></td>
                <td><?= $country['name'] //$country->name ?></td>
                <td><?= $country['population'] //$country->population ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


    <!--< ?php $form = \yii\widgets\ActiveForm::begin() ?> -->
    <!--    < ? $form->field($model, 'code') // Выводим атрибут code таблицы country ?> -->
    <!--    < ? $form->field($model, 'name') ?> -->
    <!--    < ? $form->field($model, 'population') ?> -->
    <!--    < ? $form->field($model, 'nono') // Ошибка, т.к. в модели нет такого атрибута ?> -->
    <!--    < ? $form->field($model, 'status') // Есть в модели, но нет в таблице базы данных ?> -->
    <!--< ?php $form = \yii\widgets\ActiveForm::end() ?> -->

