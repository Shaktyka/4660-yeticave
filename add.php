<?php

require_once('functions.php');
require_once('data.php');

$connect = db_connect();

if ($connect) {
    $categories = get_categories($connect); // получаем список категорий
    //print_r($categories);
}

if ($_SERVER['REQUEST_METHOD' == 'POST']) {
    
    $advert = $_POST; // массив значений полей
    $required_fields = ['lot-name', 'category', 'message', 'file', 'lot-rate', 'lot-step', 'lot-date']; // обязательные поля
    $dict = ['lot-name' => 'Название', 'category' => 'Категория', 'message' => 'Описание', 'file' => 'Изображение', 'lot-rate' => 'Начальная цена', 'lot-step' => 'Шаг ставки', 'lot-date' => 'Дата завершения'];
    $errors = [];
    
    // Сохраняем значения полей
    $title = check_input($_POST['lot-name']) ?? '';
    $category = $_POST['category'] ?? '';
    $description = check_input($_POST['message']) ?? '';
    
    $file = $_FILES['file'] ?? '';
    print_r($_FILES);
    
    $start_price = check_input($_POST['lot-rate']) ?? '';
    $bet_step = check_input($_POST['lot-step']) ?? '';
    $end_date = $_POST['lot-date'] ?? '';
    
    // Проверяем, что значения полей не пустые
    foreach ($required_fields as $key) {
        if (empty($advert[$key])) {
            $errors[$key] = 'Это поле нужно заполнить';
        }
    }
    
    // Проверяем значение числовых полей, что они числа
    if (!filter_var($start_price, FILTER_VALIDATE_INT)) {
        $errors[$key] = 'Введённое значение должно быть числом';
    }
    
    // Проверка, что число больше 0
    if ($start_price < 0) {
        $errors[$key] = 'Введённое значение должно быть больше нуля';
    }
    
    // Проверяем значение числовых полей, что они числа
    if (!filter_var($bet_step, FILTER_VALIDATE_INT)) {
        $errors[$key] = 'Введённое значение должно быть числом';
    }
    
    // Проверка, что число целое
    if (!is_int($bet_step)) {
        $errors[$key] = 'Введённое значение должно быть целым числом';
    }
    
    // Проверка, что число больше 0
    if ($bet_step < 0) {
        $errors[$key] = 'Введённое значение должно быть больше нуля';
    }
    
    // Проверяем, был ли загружен файл
    if (isset($_FILES['file']['name'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
        $tmp_size = $_FILES['file']['size'];
		$path = $_FILES['file']['name']; // похоже, ошибка
        
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        
        if ($file_type !== "image/jpeg" || $file_type !== "image/jpg" || $file_type !== "image/png") {
            $errors['file'] = 'Загрузите изображение в формате jpg, jpeg или png';
        } else {
            move_uploaded_file($tmp_name, 'img/' . $path);
			$advert['path'] = $path;
        }
	}
    
    // Если есть ошибки, то отображаем их
    if (count($errors)) {
        $page_content = include_template('add-lot.php', ['advert' => $advert, 'errors' => $errors, 'dict' => $dict, 'categories' => $categories]);
    } else {
		$page_content = include_template('lot.php', ['advert' => $advert, 'categories' => $categories]);
    }
    
    // Если всё ок, то отправляем данные формы и перенаправляем пользователя на страницу просмотра лота, иначе он остаётся на той же странице с заполненными полями и поля с ошибками подсвечены красным 
    
} else {
    
	$page_content = include_template('add-lot.php', ['categories' => $categories]);
    
}


    
//$page_content = include_template('add-lot.php', ['categories' => $categories]);
            
$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

print($layout_content);

?>