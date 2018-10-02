<?php

require_once('functions.php');
require_once('data.php');

$connect = db_connect();

if ($connect) {
    
    $categories = get_categories($connect); // получаем список категорий
    
    if (isset($_GET['id']) && $_GET['id'] == true) { // если id лота установлен
        
        $lot_id = check_input($_GET['id']); // очищаем id от "лишнего"
        $lot_id = (int)$lot_id; // приводим id лота к числу

        $ad = get_lot_data($connect, $lot_id); // запрашиваем список лотов
    
    } else {
        
        http_response_code(404); // отправляем заголовок 404
        die();
        
    }
    
    $page_content = include_template('lot.php', ['categories' => $categories, 'ad' => $ad]); // передаём список категорий и лот в $page_content
    
    $layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

    print($layout_content);
    
}

?>