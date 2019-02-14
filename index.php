<?php
$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categoryes = ["Доски и лыжи", "Крепления", "Ботинки","Одежда", "Инструменты", "Разное"];
;
$advertising =[
    [   "name" => "2014 Rossignol District Snowboard",
        "categoryes" => $categoryes[0],
        "price" => 10999,
        "url" => "img/lot-1.jpg",
    ],
    [   "name" => "DC Ply Mens 2016/2017 Snowboard",
        "categoryes" => $categoryes[0],
        "price" => 159999,
        "url" => "img/lot-2.jpg",
    ],
    [   "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "categoryes" => $categoryes[1],
        "price" => 8000,
        "url" => "img/lot-3.jpg",
    ],
    [   "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "categoryes" => $categoryes[2],
        "price" => 10999,
        "url" => "img/lot-4.jpg",
    ],
    [   "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "categoryes" => $categoryes[3],
        "price" => 7500,
        "url" => "img/lot-5.jpg",
    ],
    [   "name" => "Маска Oakley Canopy",
        "categoryes" => $categoryes[5],
        "price" => 5400,
        "url" => "img/lot-6.jpg",
    ],
];

function resize_price($price) {
    $new_price = ceil($price);
    if ($new_price > 999) {
        $new_price = number_format($new_price, 0, ',', ' ');
    };
    return $new_price.' ₽';
}

date_default_timezone_set('Europe/Moscow');

$curTime = time();
$nextDay = date('d')+1;
$nextDayString = $nextDay.'.02.2019';
$nextDayTime = strtotime($nextDayString) - $curTime;
$nextDayHour = floor($nextDayTime/3600);
$nextDayMin = floor(($nextDayTime - floor($nextDayTime/3600)*3600)/60);
$time_live = $nextDayHour.':'.$nextDayMin;


require 'functions.php';

$content = createHtml('templates/index.php', [
    'advertising' => $advertising,
    'time_live' => $time_live,
]);

$resultHTML = createHtml('templates/layout.php', [
    'title' => 'Главная страница',
    'categoryes' => $categoryes,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $content,
    'is_auth' => $is_auth,
]);

print($resultHTML);


?>


