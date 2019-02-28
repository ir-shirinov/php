<?

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categoryes = ["Доски и лыжи", "Крепления", "Ботинки","Одежда", "Инструменты", "Разное"];
;
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$error_form = 'form--invalid';
	$error_class = 'form__item--invalid';
	$flag = false;
	$name_val = $_POST['lot-name'];
	$message_val = $_POST['message'];
	$date_val = $_POST['lot-date'];
	$rate_val = $_POST['lot-rate'];
	$step_val = $_POST['lot-step'];


	if (empty($_POST['lot-name'])) {
		$flag = true;
		$error_name = $error_class;
		$error_name_text = 'Введите имя';
	};

	if (empty($_POST['category'])) {
		$flag = true;
		$error_category = $error_class;
		$error_category_text = 'Выберите категорию';
	};

	if (empty($_POST['message'])) {
		$flag = true;
		$error_message = $error_class;
		$error_message_text = 'Введите описание товара';
	};

	if (empty($_POST['lot-date'])) {
		$flag = true;
		$error_date = $error_class;
		$error_date_text = 'Введите дату окончания торгов';
	};

	if (empty($_POST['lot-rate'])) {
		$flag = true;
		$error_rate = $error_class;
		$error_rate_text = 'Введите начальную цену';
	} elseif (!filter_var($_POST['lot-rate'],FILTER_VALIDATE_INT,array('options' => array('min_range' => 0)))) {
		$flag = true;
		$error_rate = $error_class;
		$error_rate_text = 'Введите начальную цену больше 0';
	};

	if (empty($_POST['lot-step'])) {
		$flag = true;
		$error_step = $error_class;
		$error_step_text = 'Введите шаг ставки';
	} elseif (!filter_var($_POST['lot-step'],FILTER_VALIDATE_INT,array('options' => array('min_range' => 0)))) {
		$flag = true;
		$error_step = $error_class;
		$error_step_text = 'Введите шаг ставки больше 0';
	};

	if ($flag) {
		$content = createHtml('templates/add.php', [
		   	'error_form' => $error_form, 
		   	'error_name' => $error_name,
			'error_name_text' => $error_name_text,
			'error_category' => $error_category,
			'error_category_text' => $error_category_text,
			'error_message' => $error_message,
			'error_message_text' => $error_message_text,
			'error_date' => $error_date,
			'error_date_text' => $error_date_text,
			'error_rate' => $error_rate,
			'error_rate_text' => $error_rate_text,
			'error_step' => $error_step,
			'error_step_text' => $error_step_text,
			'name_val' => $name_val,
			'message_val' => $message_val,
			'date_val' => $date_val,
			'rate_val' => $rate_val,
			'step_val' => $step_val,
		]);

	} else {
		move_uploaded_file($_FILES['photo']['tmp_name'], '/domains/yeticave/'.$_FILES['photo']['name']);

		$lots  = [
			'name' => $name_val,
			"categoryes" => $_POST['category'],
	        "price" => $rate_val,
	        "url" => '/'.$_FILES['photo']['name'],
		];

		$content = createHtml('templates/lot.php', [
		    'lots' => $lots,
		]);
	};
		


} else {

	$content = createHtml('templates/add.php', [
	    'advertising' => $advertising,
	]);

};

$resultHTML = createHtml('templates/layout.php', [
	    'title' => 'Добавление лота',
	    'categoryes' => $categoryes,
	    'user_name' => $user_name,
	    'user_avatar' => $user_avatar,
	    'content' => $content,
	    'is_auth' => $is_auth,
	]);

	print($resultHTML);
?>