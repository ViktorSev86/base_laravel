<?php

namespace app\controllers;

use yii\web\Controller;

abstract class AppController extends Controller { // Создадим общий контроллер для хранения глобальных переменных и какой-то общей логики сайта , от которого будут унаследованы все остальные контроллеры
    public $my_var_var;

    public function __construct($id, $module, array $config = []) {
        $this->my_var_var = 123;
        parent::__construct($id, $module, $config);
    }

}