<?php

namespace app\components;

use yii\base\Widget;

class HelloWidget extends Widget // Создадим свой виджет
{
    
    public $name;

    public function init()
    {
        parent::init();
        if ($this->name === null) {
            $this->name = 'Гость';
        }
        ob_start(); // Включаем буферизацию, чтобы можно было менять контент виджета
    }
    
    public function run()
    {
        $content = ob_get_clean(); // Очищаем буфер и записываем его содержимое в переменную content
        $content = strip_tags($content); // Теперь мы можем делать с контентом всё, что угодно, например, убрать HTML-теги
        return  $this->render('hello', [
            'name' => $this->name,
            'content' => $content,
        ]);
        //return "Привет, {$this->name}! {$content}"; // Теперь мы можем вывести контент в любом месте
    }
}