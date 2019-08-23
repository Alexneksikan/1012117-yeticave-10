<?php

require_once('helpers.php');

$is_auth = rand(0, 1);

$user_name = 'Александр'; // укажите здесь ваше имя

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$lots_info = [

            [
                'name' => '2014 Rossignol District Snowboard',
                'category' => 'Доски и лыжи',
                'price' => 10999,
                'url' => 'img/lot-1.jpg',
                'finish_date' => '2019-09-01'
            ],
            [
                'name' => 'DC Ply Mens 2016/2017 Snowboard',
                'category' => 'Доски и лыжи',
                'price' => 159999,
                'url' => 'img/lot-2.jpg',
                'finish_date' => '2019-08-23'
            ],
            [
                'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
                'category' => 'Крепления',
                'price' => 8000,
                'url' => 'img/lot-3.jpg',
                'finish_date' => '2019-09-02'
            ],
            [
                'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
                'category' => 'Ботинки',
                'price' => 10999,
                'url' => 'img/lot-4.jpg',
                'finish_date' => '2019-08-30'
            ],
            [
                'name' => 'Куртка для сноуборда DC Mutiny Charocal',
                'category' => 'Одежда',
                'price' => 7500,
                'url' => 'img/lot-5.jpg',
                'finish_date' => '2019-11-17'
            ],
            [
                'name' => 'Маска Oakley Canopy',
                'category' => 'Разное',
                'price' => 5400,
                'url' => 'img/lot-6.jpg',
                'finish_date' => '2019-10-11'
            ]
];

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