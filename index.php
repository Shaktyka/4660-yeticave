<?php require('functions.php'); 

require('data.php');

$page_content = include_template('index.php', ['categories' => $categories, 'adds' => $adds]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => 'Главная', 'categories' => $categories]);

print($layout_content);

?>
