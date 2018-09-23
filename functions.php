<?php

// Форматирование вывода цены
function format_price ($price) {
    $symbol = '&#8381;'; // символ рубля
    
    $end_price = null;
    $price = ceil($price);
    
    if ($price > 1000) {
        $price = number_format($price, 0, '', ' ');
    }
    
    $end_price = $price . ' ' . $symbol;
    
    return $end_price;
};

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require_once $name;

    $result = ob_get_clean();

return $result;
};

?>