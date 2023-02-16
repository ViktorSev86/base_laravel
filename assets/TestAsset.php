<?php

namespace app\assets;

use yii\web\AssetBundle;


class TestAsset extends AssetBundle {

    // Если ресурсы не расположены в папке web, мы должны использовать SourcePath - задаёт корневую директорию, содержащую файлы ресурса. Если ресурсы расположены в папке web, устанавливаем свойства basePath и baseUrl.
    //public $sourcePath = '@app/components';

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [ // Перечисляем все свойства стилей, которые используем в проекте
        'css/styles.css',
    ];

    public $js = [
        //'scripts.js',
        //'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', // Подключаем библиотеку jquery. Альтернативный способ - через зависимости: задать свойство $depends.
        'js/scripts.js',
    ];

    public $depends = [ // Зависимости
        'yii\web\YiiAsset', // Подключаем jquery и другие скрипты через зависимости
        'yii\bootstrap4\BootstrapAsset', // Подключаем библиотеку Bootstrap.css
        'yii\bootstrap4\BootstrapPluginAsset', // Подключаем файл для работы с плагинами
    ];
}









