<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%categories}}';
    }

    /*
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id'])->where('price < 1000')->orderBy('price DESC'); // Связываем таблицы продукт (многие) и категории (один), у которых цена меньше тысячи, отсортированных по убыванию цены
    }
    */

    
    public function getProducts($price = 1000)
    {
        return $this->hasMany(Product::class, ['category_id' => 'id'])->where('price < :price', [':price' => $price])->orderBy('price'); // Связываем таблицы продукт (многие) и категории (один), у которых цена меньше цены, введённой пользователем, отсортированных по возрастанию цены
    }
    
    

}