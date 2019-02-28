<?
require 'lots_data.php';
require 'functions.php';
$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categoryes = ["Доски и лыжи", "Крепления", "Ботинки","Одежда", "Инструменты", "Разное"];
;


if (isset($advertising[$_GET['item']])) {
	$content = createHtml('templates/lot.php', [
	    'lots' => $advertising[$_GET['item']],
	]);
	$title = $advertising[$_GET['item']]['name'];

	if (isset($_COOKIE['lots'])) {
		$lots = json_decode($_COOKIE['lots']);
		$isFlag = false;
		if (is_array($lots)) {
			foreach ($lots as $value) {
				if ($value == $_GET['item']) {
					$isFlag = true;
				}
			}
		} else {
			if ($lots == $_GET['item']) {
				$isFlag = true;
			}
		}
		

		if (!$isFlag) {

			if (!is_array($lots)) {
				$lots_arr =[];
				$lots__arr[] = $lots;
				$lots__arr[] = intval ($_GET['item']);
				setcookie('lots',json_encode($lots__arr), strtotime("+30 days"),'/');
			} else {
				array_push($lots, intval($_GET['item']));
				setcookie('lots',json_encode($lots), strtotime("+30 days"),'/');
			}
			
		};
	} else {
		setcookie('lots',intval($_GET['item']), strtotime("+30 days"),'/');
	};
	
} else {
	http_response_code(404);
	$content = '404';
	$title = '404';
}

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