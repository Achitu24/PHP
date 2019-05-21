<?php
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	parse_str(file_get_contents("php://input"), $_PUT);
	foreach ($_PUT as $key => $value) {
		unset($_PUT[$key]);

		$_PUT[str_replace('amp;', '', $key)] = $value;
	}
	
	
	
	print_r(parse_url($_SERVER['REQUEST_URI']));
	//$parts = parse_url($url);
	//parse_str($parts['query'], $query);
	//echo $query['email'];
	
	$_REQUEST = array_merge($_REQUEST, $_PUT);
}
?>

