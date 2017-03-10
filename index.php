<?php

define( 'BWG_ROOT', 'http://' .$_SERVER['HTTP_HOST']);
$path = $_SERVER["REQUEST_URI"];

include_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "parts/init.php";

$template = strlen( $path ) < 2 ? 'landing' : ( strpos( $path, '?' ) > - 1 ? substr( $path, 0, strpos( $path, '?' ) ) : $path );

$open = isset($_GET['open']);

$template = $loggedIn ? $template : 'landing';

if ( strlen( $template ) > 1 ) :

	$css      = [ 'css/bwg-i.css' ];
	$js       = [ 'js/shoplink.js' ];
	$page_css = [];
	$page_js  = [];
	switch ( $template ) {
		case "planogram":
		case "single-planogram":
			$page_css[] = 'vendor/mp/magnific.popup.css';
			$page_js [] = 'vendor/mp/magnific.popup.min.js';
			break;
		default:
	}
	$css = array_merge( $css, $page_css );
	$js  = array_merge( $js, $page_js );
	include dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "parts/header.php";
	include dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "parts/nav.php";

	echo '<div class="flexWrap' . ( $template == 'landing' ? ' v-center' : ' clear' ) . '">';
	if ($template !== '/!'){
		include dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "parts/pages/{$template}.php";
	}

	echo '</div>' . $modal;
	include dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "parts/footer.php";

endif;