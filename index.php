<?php
include "parts/init.php";

$path = substr($_SERVER["REQUEST_URI"], 1);
$template = strlen($path) < 1 ? 'landing' : substr($path, 0, strpos($path,'?'));

$css = [];
$js = [];

switch ($template) {
	case "landing" :
		$css = ['home.css'];
		$js = ['home.js'];
		break;
	case "section" :
		$css = ['section.css'];
		break;
	default:
}

include "parts/header.php";
include "parts/nav.php";

echo '<div class="flexWrap'.($template == 'landing' ? ' v-center':' clear').'">';

include "parts/pages/{$template}.php";

echo '</div>';
include "parts/footer.php";
