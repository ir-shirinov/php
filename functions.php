<?
function createHtml ($template_path, $data) {
	ob_start();

	require $template_path;

	$html = ob_get_clean();

	if ($html == null) {
		return '';
	} else {
		return $html;
	};
};

function searchUserByEmail($email, $arr) {
	$users_r = false;
	foreach ($arr as $value) {
		if ($value['email'] == $email) {
			$users_r = $value;
		};
	};
	return $users_r;
};

?>