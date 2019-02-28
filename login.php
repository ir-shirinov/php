<?
require 'lots_data.php';
require 'functions.php';
require 'userdata.php';

session_start();
$base = mysqli_connect('yeticave', 'root', '','yeticave');
mysqli_set_charset($base, 'utf8');

if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$form = $_POST;

	$required = ['email', 'password'];
	$errors = [];

	foreach ($required as $field) {
		if (empty($form[$field])) {
			$errors[$field] = 'Это поле нужно заполнить';
		};
	};
	
	$safe_email = mysqli_real_escape_string($base, $form['email']);
	$sql = "SELECT email, password FROM users WHERE `email`='$safe_email'";
	$user = mysqli_query($base, $sql);
	$user = mysqli_fetch_all($user, MYSQLI_ASSOC);

	if ((!count($errors)) and $user) {
		if (password_verify($form['password'],$user[0]['password'])) {
			$_SESSION['user'] = $user;
		} else {
			$errors['password'] = 'Неверный пароль';
		}
		
	} else {
		$errors['email'] = 'Такой пользователь не найден';
	};

	if (count($errors)) {
		$page_content = createHtml('templates/login.php', [
			'form' => $form,
			'errors' => $errors,
		]);
	} else {
		header('Location: /index.php');
		exit();
	}


} else {
	if (isset($_SESSION['user'])) {
		$page_content = createHtml('templates/login.php', [
			'form' => $form,
		]);
	} else {
		 $page_content = createHtml('templates/login.php', []);
	}
}

$resultHTML = createHtml('templates/layout.php', [
	    'title' => 'Страница регистрации',
	    'categoryes' => $categoryes,
	    'content' => $page_content,
	]);

	print($resultHTML);

?>