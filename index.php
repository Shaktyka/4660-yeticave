<?php
require('functions.php'); 
require ('data.php');

$connect = db_connect();
 
if ($connect) {
        
    $categories = get_categories($connect); // получаем список категорий
    //print_r($categories);
    
    $adds = get_open_lots($connect); // получаем список объявлений
}

$page_content = include_template('index.php', ['categories' => $categories, 'adds' => $adds]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

print($layout_content);

?>
