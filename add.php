<?php

require_once('functions.php');

$connect = db_connect();

if ($connect) {
    
    $categories = get_categories($connect); // получаем список категорий
    
    
    
    $page_content = include_template('add-lot.php', ['categories' => $categories]);
            
    $layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

    print($layout_content);
    
}

?>