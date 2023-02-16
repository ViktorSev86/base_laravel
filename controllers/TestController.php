<?php

namespace app\controllers;
use  yii\web\View;
use app\models\EntryForm;
use app\models\Country; // Подключаем класс модели - базы данных country
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;

class TestController extends AppController { 

    public $my_var;
    //public $layout = 'test'; // Заменяем шаблон для контроллера тест

    //public $defaultAction = 'my-test'; //Переназначаем действие по умолчанию, если метод не указан, вызывается action Index, а мы его переназначаем и вызывается actionMyTest()

    public function actionIndex($name = "Guest", $age = 25) {

        $this->layout = 'test'; // Заменяем шаблон для экшна index
        $this->view->params['t1'] = 'T1 params'; // Передаём данные в свойство params объекта View без рендеринга, так мы можем достучаться до параметра только из контроллера
        $this->view->title = 'Tese Page'; // Задаём заголовок через контроллер, альтернативно можно через вид (представление)
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description'); // Задаём мета-тег через контроллер, альтернативно можно через вид (представление), 2-й параметр служит для контроля уникальности мета-тега
        
        $model = new EntryForm(); // Создаём объект формы, который передадим последним параметром в функции рендер

        // Асинхронная отправка данных AJAX
        $model->load(\Yii::$app->request->post());
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->validate()){
                return ['message' => 'ok'];
            }else{
                return ActiveForm::validate($model);
            }
            //return ActiveForm::validate($model);
        }

        return $this->render('index', compact('model'));
    }
    
    public function actionView() // Создадим представление для работы с моделями - базами данных
    { 
        $this->layout = 'test'; // Меняем стандартный шаблон на шаблон test
        $this->view->title = 'Работа с моделями'; // Задаём title страницы

        // $model = new Country(); // Создадим экземпляр класса модели - таблицы country

        //$countries = Country::find()->all(); // Создаём новый объект запроса (SELECT * FROM wfm_countries) методом find и получим все записи методом all
        //$countries = Country::find()->where("population < 100000000 AND code <> 'AU'")->all(); // Объект запроса (SELECT * FROM wfm_countries WHERE population < 100000000 AND code <> 'AU')
        //$countries = Country::find()->where("population < :population AND code <> :code", [':code' => 'AU', ':population' => 100000000])->all(); // Тот же запрос, только с использованием привязок и второго параметра в виде массива привязок
        /*$countries = Country::find()->where([
            'code' => ['DE', 'FR', 'GB'],
            'status' => 1,
            ])->all(); // Объект запроса (SELECT * FROM wfm_countries WHERE code IN ['DE', 'FR', 'GB'] AND status = 1) с массивом условий
        */
        //$countries = Country::find()->where(['like', 'name', 'ni'])->all(); //  Объект запроса (SELECT * FROM wfm_countries WHERE name LIKE '%ni%')
        //$countries = Country::find()->orderBy('population DESC')->all(); // Сортировка по населению в обратном порядке
        //$countries = Country::find()->count(); debug($countries, 1); // Количество записей в таблице, debug выводит количество записей и завершает выполнение скрипта, чтобы избежать ошибки, т.к. у нас для вывода используется цикл foreach
        //$countries = Country::find()->one(); debug($countries, 1); // Выводим одну первую запись таблицы. Это не рацианальный метод, т.к. в запросе берутся все записи (SELECT * FROM wfm_countries), а метод one берёт первую 
        //$countries = Country::find()->limit(1)->one(); debug($countries, 1); // То же, только рацианальный запрос (SELECT * FROM wfm_countries LIMIT 1)
        //$countries = Country::find()->where(['code' => ['CN', ]])->limit(1)->one(); debug($countries, 1); // Выводим одну страну с кодом CN
        //$countries = Country::findAll(['DE', 'FR', 'GB']); //Объект запроса (SELECT * FROM wfm_countries WHERE code IN ['DE', 'FR', 'GB']
        //$countries = Country::findOne('BR'); debug($countries, 1); // Выводим одну страну с кодом BR
        $countries = Country::find()->asArray()->all(); // Получаем данные не в виде массивов, а в виде объектов для экономии памяти

        return $this->render('view', compact('countries')); // Передаём в вид массив объектов countries. 
    }
        
        //debug($model); // Печать модели с пустыми свойствами
        //if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
        //    //debug($model); // Печать модели с заполненными свойствами (после отправки на сервер)
        //    if (\Yii::$app->request->isPjax) {
        //        \Yii::$app->session->setFlash('success', 'Данные приняты через Pjax'); // Записываем сообщение при успешно прошедшей валидации формы в сессию
        //        $model = new EntryForm();
        //    } else {
        //       \Yii::$app->session->setFlash('success', 'Данные приняты стандартно');
        //        return $this->refresh(); // Отправляет пользователя на ту же страницу, то есть перезапускает страницу после отправки страницы, при этом все поля ввода очищаются
        //    }
        //}
        

        //debug(\Yii::getAlias('@webroot')); // Выводим алиасы путей ресурсов, расположенных в папке web. 
        //debug(\Yii::getAlias('@web'));

        
        
        //$this->my_var = 'My Variable'; // К переменной можно обратиться из вида без рендеринга или из шаблона

        // var_dump($_GET); // Распечатка для отладки
        //var_dump($name); // Распечатываем параметр, который берётся из строки запроса
        //return "<h1>Hello world!</h1>";
        
        //return $this->render('index'); // Подключает полностью весь шаблон с стандартными стилями и скриптами
        //return $this->renderPartial('index'); // Рендерит только вид без шаблона, стилей и скриптов
        //return $this->renderAjax('index'); // Рендерит без шаблона, но подключает все стили и скрипты
        //return $this->renderFile('@app/views/test/index.php'); // Рендерит из файла без шаблона, используется редко, аналогичен RenderPartial
        
        //return $this->render('index', [
        //    'name' => $name, // Передаём данные в вид index.php
        //    'age' => $age,
        //]);

        //\Yii::$app->view->params['t1'] = 'T1 params'; // Передаём данные в свойство params объекта View без рендеринга, так мы можем достучаться до параметра из любого файла
        
        //\Yii::$app->view->on(View::EVENT_END_BODY, function() { // Выводим копирайт и год в нижней части body
        //    echo "<p>&copy; Yii2 " . date("Y") .  "</p>";
        //});

        //debug(\Yii::$app); // Выводит на печать все настройки сайта 
        
        //return $this->render('index', compact(/*'name', 'age',*/ 'model')); // Рендерим вид и одновременно передаём в вид переменные, последним параметром передаём модель формы
    //}
    

    //public function actions() { 
    //    return ['test' => 'app\components\HelloAction',]; // Вызывает класс, который будет отрабатывать при обращении к действию Test
    //}
    
    public function actionMyTest() {
        //return __METHOD__;
        return $this->render('my-test');
    }

    public function actionCreate()
    {
        $this->layout = 'test';
        $this->view->title = 'Create';

        $country = new Country(); // Создаём объект новой записи в таблице country и ниже заполняем свойства объекта

        if(\Yii::$app->request->isAjax){
            $country->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($country);
        }

        if($country->load(\Yii::$app->request->post()) && $country->save()){
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        /*
        $country = new Country(); // Пример ввода записи в таблицу из кода программы, на практике такое не применяется, вместо этого используются формы ввода
        $country->code = 'BL';
        $country->name = 'Belarus';
        $country->population = 12000000;
        $country->status = 1;
        

        if($country->save()) { // Вносим новую запись в базу данных, в методе save валидация автоматическая, если вернул true, то данные внеслись
            \Yii::$app->session->setFlash('success', 'OK'); // В случае успешной записи данных в базу записываем в сессию значение OK
        } else {
            \Yii::$app->session->setFlash('error', 'NO');
        }
        */
        

        return $this->render('create', compact('country'));
    }

    public function actionUpdate() 
    {
        $this->layout = 'test';
        $this->view->title = 'Update';

        $country = Country::findOne('BL');
        if(!$country) {
            throw new NotFoundHttpException('Country not found');
        }

        if($country->load(\Yii::$app->request->post()) && $country->save()){ // Если данные пришли методом пост, прошли валидацию и сохранены, записываем в сессию OK и очищаем форму
            \Yii::$app->session->setFlash('success', 'OK');
            return $this->refresh();
        }

        return $this->render('update', compact('country'));
    }

    public function actionDelete($code = '')
    {
        $this->layout = 'test';
        $this->view->title = 'Delete';

        $country = Country::findOne($code);
        if($country) {
            if(false !== $country->delete()) {
                \Yii::$app->session->setFlash('success', 'OK');
            } else {
                \Yii::$app->session->setFlash('error', 'Error');
            }
        }

        return $this->render('delete', compact('country'));
    }

}