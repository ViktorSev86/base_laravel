<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends AppController
{

    public function actionIndex() // Жадная загрузка данных - уменьшает количество запросов SQL
    {
        $this->view->title = 'Products';
        $products = Product::find()->with('category')->all(); // Вызываем метод with с названием связи в качестве параметра - это делает загрузку жадной
        return $this->render('index', compact('products'));
    }

    /*
    public function actionIndex() // Отложенная загрузка данных
    {
        $this->view->title = 'Products';
        $products = Product::find()->all();
        return $this->render('index', compact('products'));
    }
    */

    public function actionView($id = null)
    {
        $product = Product::findOne($id); // Получаем один продукт по id из таблицы продуктов
        $this->view->title = "Product: {$product->title}";
        return $this->render('view', compact('product'));
    }

}