<?
require 'lots_data.php';
require 'functions.php';
$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categoryes = ["Доски и лыжи", "Крепления", "Ботинки","Одежда", "Инструменты", "Разное"];
;
$title = "История просмотров";


$arr_lots_id = json_decode($_COOKIE['lots']);
$arr_lots = [];

if (is_array($arr_lots_id )) {
	foreach ($arr_lots_id as $key => $value) {
		$arr_lots[] = $advertising[$value];
	};
} else {
	$arr_lots[] = $advertising[$arr_lots_id];
};


$content = createHtml('templates/all-lots.php', [
    'advertising' => $arr_lots,
]);
	

$resultHTML = createHtml('templates/layout.php', [
    'title' => $title,
    'categoryes' => $categoryes,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar,
    'content' => $content,
    'is_auth' => $is_auth,
]);

print($resultHTML);

?>