<?php
$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categoryes = ["Доски и лыжи", "Крепления", "Ботинки","Одежда", "Инструменты", "Разное"];
;



require 'lots_data.php';

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

$base = mysqli_connect('yeticave', 'root', '','yeticave');
mysqli_set_charset($base, 'utf8');
$sql = 'SELECT * FROM lots l
JOIN categories c
ON l.cat_id = c.id
WHERE date_end IS NOT NULL ORDER BY date_init ASC';
$result = mysqli_query($base, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


$content = createHtml('templates/index.php', [
    'advertising' => $rows,
    'time_live' => $time_live,
]);

$resultHTML = createHtml('templates/layout.php', [
    'title' => 'Главная страница',
    'categoryes' => $categoryes,
    'content' => $content,
]);

print($resultHTML);


?>


