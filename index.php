<?php
require('functions.php'); 
require ('data.php');

$connect = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($connect, "utf8");
 
if (!$connect){
    
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    die();
    
} else {
    
    // Запрашиваем список категорий из базы
    $query = 'SELECT category FROM categories';
    $result = mysqli_query($connect, $query);
    
    if (!$result) {
        
        $error = mysqli_error($connect);
        print("Ошибка MySQL: " . $error);
        die();
        
    } else {
        
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //print_r($categories);
    }
    
    // Запрашиваем список последних лотов
    $query = 'SELECT title, start_price, img_path, category, end_date, MAX(amount) as cur_price FROM lots l JOIN categories ON category_id = cat_id JOIN bets b ON l.lot_id = b.lot_id GROUP BY b.lot_id ORDER BY end_date DESC;';
    $result = mysqli_query($connect, $query);
        
    if (!$result) {
        
        $error = mysqli_error($connect);
        print("Ошибка MySQL: " . $error);
        die();
        
    } else {
        
        $adds = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //print_r($adds);
        
    }
}

$page_content = include_template('index.php', ['categories' => $categories, 'adds' => $adds]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

print($layout_content);

?>
