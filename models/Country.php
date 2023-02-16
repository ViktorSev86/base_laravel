<?php

namespace app\models;

use yii\db\ActiveRecord;

// Создадим класс для работы с таблицей country, которую мы создали в MySQL
class Country extends ActiveRecord
{
    public static function tableName() // Если имя модели и таблицы не совпадает, нужно переопределить метод, задающий имя таблицы
    {
        //return '{{countries}}'; // Двойные фигурные скобки нужны для экранирования (безопасность)
        return '{{%countries}}'; // Добавляем префикс, который определяется в файле конфигураций config\db
    }

    public function rules() // Валидация вставляемых в таблицу country записей
    {
        return [
            [['code', 'name', 'population', 'status'], 'required'],
            ['code', 'unique'],
            ['population', 'integer'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels() // Устанавливаем метки для полей формы
    {
        return [
            'code' => 'Код страны',
            'name' => 'Страна',
            'population' => 'Население',
            'status' => 'Статус',
        ];
    }
}