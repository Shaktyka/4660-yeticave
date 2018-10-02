<?php

require_once('functions.php');
require_once('data.php');

$connect = db_connect();

if ($connect) {
    
    $categories = get_categories($connect);
    
    $lot_id = (int)($_GET['id']); // как вариант, intval
    $ad = get_lot_data($connect, $lot_id);
    
    $page_content = include_template('lot.php', ['categories' => $categories, 'ad' => $ad]);
            
    $layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

    print($layout_content);
    
}

?>