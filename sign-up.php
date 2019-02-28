<?

require 'functions.php';


session_start();
$base = mysqli_connect('yeticave', 'root', '','yeticave');
mysqli_set_charset($base, 'utf8');

if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$form = $_POST;

	$required = ['email', 'password', 'name', 'message'];
	$errors = [];

	foreach ($required as $field) {
		if (empty($form[$field])) {
			$errors[$field] = 'Это поле нужно заполнить';
		};
	};

	$safe_email = mysqli_real_escape_string($base,$form['email']);
	$sql = "SELECT email FROM users WHERE `email`='$safe_email'";
	$user = mysqli_query($base, $sql);
	$user = mysqli_fetch_all($user, MYSQLI_ASSOC);
	

	if ($user) {
		$errors['email'] = 'Пользователь с таким email уже существует';
	};

	if (count($errors)) {
		$page_content = createHtml('templates/sign-up.php', [
			'form' => $form,
			'errors' => $errors,
		]);
	} else {
		if (isset($_FILES['ava-user']['tmp_name'])) {
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$file_type = finfo_file($finfo, $_FILES['ava-user']['tmp_name']);
			if ($file_type == 'image/jpeg') {
				$path_img = '/domains/yeticave/'.$_FILES['ava-user']['name'];
				move_uploaded_file($_FILES['ava-user']['tmp_name'], $path_img );
			} else {
				$path_img='';
			}
		} else  {
			$path_img='';
		}
		

		$nameUser = $form['name'];
		$emailUser = $form['email'];
		$messageUser = $form['message'];
		$passwordUser = password_hash($form['password'], PASSWORD_DEFAULT);
		$dateUser = date('Y/m/d');


		$sql = "INSERT INTO users(email, password,data_register,name,ava,contact) VALUES (?,?,?,?,?,?)";
		$stmt = mysqlI_prepare($base, $sql);
		mysqli_stmt_bind_param($stmt, 'ssssss',$emailUser,$passwordUser,$dateUser,$nameUser,$path_img,$messageUser);
		mysqli_stmt_execute($stmt);

		header('Location: /index.php');
		exit();
	}


} else {
	if (isset($_SESSION['user'])) {
		$page_content = createHtml('templates/login.php', [
			'form' => $form,
		]);
	} else {
		 $page_content = createHtml('templates/sign-up.php', []);
	}
}

$resultHTML = createHtml('templates/layout.php', [
	    'title' => 'Страница регистрации',
	    'categoryes' => $categoryes,
	    'content' => $page_content,
	]);

	print($resultHTML);

?>