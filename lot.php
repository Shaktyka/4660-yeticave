<?php

require_once('functions.php');
require_once('data.php');

$connect = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($connect, "utf8");

if (isset($_GET['id'])) {
    $lot_id = $_GET['id'];
}

if (!$connect){
    
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    die();
    
} else {
    
    $query = 'SELECT l.lot_id, title, category, description, img_path, start_date, end_date, start_price, bet_step, MAX(amount) AS cur_price 
    FROM lots l
    JOIN categories c
    ON l.category_id = c.cat_id
    JOIN bets b
    ON l.lot_id = b.lot_id
    WHERE l.lot_id =' . $lot_id;
    
    $result = mysqli_query($connect, $query);
    
    if (!$result) {
        $error = mysqli_error($connect);
        print("Ошибка MySQL: " . $error);
        die();
    } else {
        
        $ad = mysqli_fetch_assoc($result);
        //print_r($categories);
    }
    
}

$page_content = include_template('lot.php', ['categories' => $categories, 'ad' => $ad]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

print($layout_content);

?>