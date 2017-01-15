<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="Andrei Gheorghiu">
	<link rel="icon" href="!#favicon.ico">

	<title>BWG - Shoplink</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,900&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
	<link href="../assets/vendor/toastr/toastr.min.css" rel="stylesheet">
	<link href="../assets/vendor/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../assets/css/base.css" rel="stylesheet">

	<?php
	foreach ( $css as $c ) { ?>
		<link href="../assets/css/<?= $c; ?>" rel="stylesheet"/>
	<?php } ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="../assets/vendor/bootstrap/js/html5shiv.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>