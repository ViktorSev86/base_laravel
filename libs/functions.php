<?php

function debug($data, $die = false) { // Создаём функцию для распечатки данных, подключается во Фронт контроллере (web/index.php)
    echo "<pre>" . print_r($data, 1) . "<pre>";
    if ($die) {
        die;
    }
}