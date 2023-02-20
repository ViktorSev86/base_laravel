<?php

namespace app\controllers;

use app\models\Category;

class CategoryController extends AppController
{

    public function actionIndex()
    {
        $this->view->title = 'Categories';
        $categories = Category::find()->all(); // Получаем все категории из таблицы Categories
        return $this->render('index', compact('categories'));
    }

    public function actionView($id = null)
    {
        $category = Category::findOne($id); // Получаем одну категорию по id из таблицы Categories
        $products = $category->getProducts(850)->all(); // Вызываем геттер, который получает все товары для категории c id из параметра, цена которых меньше переданной в параметр геттера (price < 850)
        $this->view->title = "Category: {$category->title}";
        return $this->render('view', compact('category', 'products'));
    }

    /*
        public function actionView($id = null)
    {
        $category = Category::findOne($id); // Получаем одну категорию по id из таблицы Categories
        $this->view->title = "Category: {$category->title}";
        return $this->render('view', compact('category'));
    }
    */

}