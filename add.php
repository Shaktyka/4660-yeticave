<?php

require_once('functions.php');
require_once('data.php');

$form_data = $_POST; // массив значений полей

$required_fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date']; // обязательные поля
$errors = [];

//print_r($_POST);
//(count($form_data));

if (isset($_POST['lot-submit'])) {
    // проверяем поля
    
    // Сохраняем значения полей
    $title = htmlspecialchars($_POST['lot-name']) ?? '';
    $category = $_POST['category'] ?? '';
    $description = htmlspecialchars($_POST['message']) ?? '';
    
    $file = $_POST['file'] ?? '';
    
    $start_price = $_POST['lot-rate'] ?? '';
    $bet_step = $_POST['lot-step'] ?? '';
    $end_date = $_POST['lot-date'] ?? '';
    
    print_r($title);
}

$connect = db_connect();

if ($connect) {
    
    $categories = get_categories($connect); // получаем список категорий
    
    
    
    $page_content = include_template('add-lot.php', ['categories' => $categories]);
            
    $layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

    print($layout_content);
    
}

?>