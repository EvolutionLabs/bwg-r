<?php
include_once "parts/init.php";

$path = substr($_SERVER["REQUEST_URI"], 1);
$template = strlen($path) < 1 ? 'landing' : (strpos($path, '?') > -1 ? substr($path, 0, strpos($path,'?')) : $path);

$template = $loggedIn? $template : 'landing';

if (strlen($template) > 1) :

	$css = ['bwg-i.css'];
	$js = ['shoplink.js'];
	$page_css = [];
	$page_js = [];
switch ($template) {
	case "landing" :
		$page_css[] = 'home.css';
		$page_js[] = 'home.js';
		break;
	/** @noinspection PhpMissingBreakStatementInspection */
	case "cart" :
		$page_css[] = 'cart.css';
	case "section" :
		$page_css[] = 'section.css';
		$page_js []= 'section.js';
		break;
	case "search" :
		$page_css[] = 'search.css';
		break;
	default:
}
$css = array_merge($css, $page_css);
$js = array_merge($js, $page_js);
include "parts/header.php";
include "parts/nav.php";

echo '<div class="flexWrap'.($template == 'landing' ? ' v-center':' clear').'">';

include "parts/pages/{$template}.php";

echo '</div>';
include "parts/footer.php";

endif;