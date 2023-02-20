<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%products}}';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']); // Связываем таблицы категории (один) и продукт (один) 
    }
}