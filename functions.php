<?php

// Подключение к БД
function db_connect() {
    
    $db_params = [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'database' => 'yeticave'
    ];
    
    $connect = mysqli_connect($db_params['host'], $db_params['user'], $db_params['pass'], $db_params['database']);
    
    mysqli_set_charset($connect, 'utf8'); // устанавливаем кодировку
    
    if (!$connect) {
        
        print('Ошибка: Не удалось подключиться к MySQL ' . mysqli_connect_error());
        die();
    }
    
    return $connect;
};


// Подключение шаблонов
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require_once $name;

    $result = ob_get_clean();

return $result;
};


// Форматирование вывода цены
function format_price ($price) {
    $symbol = '&#8381;'; // символ рубля
    
    $end_price = null;
    $price = ceil($price);
    
    if ($price > 1000) {
        $price = number_format($price, 0, '', ' ');
    }
    
    $end_price = $price . ' ' . $symbol;
    
    return $end_price;
};


// Вывод оставшегося до полуночи времени
function get_time() {
    
    $cur_date = time(); // текущая дата
    $tom_date = strtotime('Tomorrow'); // полночь завтрашнего дня
    
    $delta = $tom_date - $cur_date; // разница
    
    $date = gmdate('H:i', $delta); // форматируем дату
    
    return $date;
};

?>
