<?php
$connect = mysqli_connect('localhost', 'root', '', 'yeticave');
mysqli_set_charset($connect, 'utf8');
 
if (!$connect){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
    // Запрашиваем список категорий из базы
    $query = 'SELECT * FROM categories';
    $result = mysqli_query($connect, $query);
    
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

require('functions.php'); 

require ('data.php');

$page_content = include_template('index.php', ['categories' => $categories, 'adds' => $adds]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => 'Главная', 'categories' => $categories]);

print($layout_content);

?>
