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
	<link href="<?=BWG_ROOT;?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/bootstrap/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/bar-rating/fontawesome-stars-o.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/slick/slick.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/slick/slick-theme.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/toastr/toastr.min.css" rel="stylesheet">
	<link href="<?=BWG_ROOT; ?>/assets/vendor/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=BWG_ROOT; ?>/assets/css/base.css" rel="stylesheet">

	<?php
	foreach ( $css as $c ) { ?>
		<link href="<?=BWG_ROOT; ?>/assets/<?= $c; ?>" rel="stylesheet"/>
	<?php } ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?=BWG_ROOT; ?>/assets/vendor/bootstrap/js/html5shiv.min.js"></script>
	<script src="<?=BWG_ROOT; ?>/assets/vendor/bootstrap/js/respond.min.js"></script>
	<![endif]-->
</head>

<body data-page="<?=$template;?>"<?= $open?' class="openRows"':'';?>>
<div class="modal fade" tabindex="-1" role="dialog" id="mixAndMatch">
	<div class="modal-dialog" role="document">
        <div class="container">
            <div class="row">
                <div class="modal-content loading">
                    <div class="modal-header bg-alert">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="sk-folding-cube">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->