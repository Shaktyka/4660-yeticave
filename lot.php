<?php

require('functions.php');

require ('data.php');

$page_content = include_template('lot.php', ['categories' => $categories]);

$layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

print($layout_content);

?>