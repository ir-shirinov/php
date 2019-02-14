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
}

?>