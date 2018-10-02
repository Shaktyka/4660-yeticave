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


// Получение списка категорий
function get_categories($connect) {
    
    $query = 'SELECT category FROM categories';
    $result = mysqli_query($connect, $query);
    
    if (!$result) {
        
        $error = mysqli_error($connect);
        print("Ошибка MySQL: " . $error);
        die();
        
    }
    
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($categories);
    
    return $categories;
    
};


// Получение списка последних открытых лотов
function get_open_lots($connect) {
    
    $query = 'SELECT l.lot_id, title, start_price, img_path, category, start_date, end_date, 
       MAX(amount) as cur_price FROM lots l 
       JOIN categories ON category_id = cat_id 
       LEFT JOIN bets b ON l.lot_id = b.lot_id 
       GROUP BY l.lot_id ORDER BY start_date DESC;';
    
    $result = mysqli_query($connect, $query);
        
    if (!$result) {
        
        $error = mysqli_error($connect);
        print("Ошибка MySQL: " . $error);
        die();
        
    }
        
    $adds = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($adds);
        
    return $adds;
    
};


// Получение данных лота по его id
function get_lot_data($connect, $lot_id) { 
    
    if (isset($lot_id)) {
        
        $query = 'SELECT l.lot_id, title, category, description, img_path, start_date, end_date, start_price, bet_step, MAX(amount) AS cur_price 
        FROM lots l
        JOIN categories c
        ON l.category_id = c.cat_id
        JOIN bets b
        ON l.lot_id = b.lot_id
        WHERE l.lot_id =' . $lot_id;
    
        $result = mysqli_query($connect, $query);
        $res_count = mysqli_num_rows($result);
        //print_r($res_count);
        
        if ($res_count < 1) {
            http_response_code(404);
            die();
        }
    
        if (!$result) {
        
            $error = mysqli_error($connect);
            print("Ошибка MySQL: " . $error);
            die();
        
        } else {
        
            $ad = mysqli_fetch_assoc($result);
            return $ad;
    
        }
    
    } else {
        http_response_code(404);
        die();
    }
    
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
