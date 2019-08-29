<?php

require_once('helpers.php');

// Подключение БД
$con = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($con, "utf8");

$is_auth = rand(0, 1);

$user_name = 'Александр'; // укажите здесь ваше имя

function formatPrice($lot_price)
{
    $lot_price = ceil($lot_price);
    
    if ($lot_price >= 1000) { 
        $lot_price = number_format($lot_price, 0, '', ' ');
    }

    return $lot_price . ' ₽';
}


function get_dt_range($f_date)
{
    $date_end = strtotime($f_date);
    $date_current = time();
    $period = $date_end - $date_current;
    $period_hour = floor($period / 3600);
    $period_min = floor(($period - $period_hour * 3600) / 60);
    $h_m = [
        'hours'     => str_pad($period_hour, 2, "0", STR_PAD_LEFT),
        'minutes'   => str_pad($period_min,  2, "0", STR_PAD_LEFT)
    ];
    return $h_m;
}


$sql = "SELECT l.name, l.start_price, l.image, l.finish_price, l.finish_date, c.name category, l.image FROM lots l, categories c WHERE l.category=c.id AND l.winner IS NULL ORDER BY start_date DESC";
$lots_info = mysqli_query($con, $sql);

$sql = "SELECT name, symbol_code FROM categories;";
$categories = mysqli_query($con, $sql);



$page_content = include_template('main.php', [
    'categories' => $categories,
    'lots_info' => $lots_info
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $title,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => $categories
]);

print($layout_content);

?>