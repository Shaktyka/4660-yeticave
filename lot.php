<?php

require_once('functions.php');
require_once('data.php');

$connect = db_connect();

if ($connect) {
    
    if (isset($_GET['id']) && $_GET['id'] == true) {
    
        $lot_id = intval($_GET['id']);
        
        $query = 'SELECT l.lot_id, title, category, description, img_path, start_date, end_date, start_price, bet_step, MAX(amount) AS cur_price 
        FROM lots l
        JOIN categories c
        ON l.category_id = c.cat_id
        JOIN bets b
        ON l.lot_id = b.lot_id
        WHERE l.lot_id =' . $lot_id;
    
        $result = mysqli_query($connect, $query);
        $res_count = mysqli_num_rows($result);
        //print_r($res_count);
        
        if ($res_count < 1) {
            http_response_code(404);
            die();
        }
    
        if (!$result) {
        
            $error = mysqli_error($connect);
            print("Ошибка MySQL: " . $error);
            die();
        
            } else {
        
                $ad = mysqli_fetch_assoc($result);
                $page_content = include_template('lot.php', ['categories' => $categories, 'ad' => $ad]);
            
                $layout_content = include_template('layout.php', ['content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories]);

                print($layout_content);
            }
    
        } else {
            http_response_code(404);
            die();
        }
    
    }

?>