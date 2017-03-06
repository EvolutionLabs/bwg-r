<script src="<?=BWG_ROOT;?>/assets/vendor/jquery/jquery-2.2.4.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/velocity/velocity.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/slick/slick.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/toastr/toastr.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/bar-rating/jquery.barrating.min.js"></script>
<script src="<?=BWG_ROOT; ?>/assets/vendor/bootstrap/js/ie10-viewport-bug-workaround.js"></script>
<?php
foreach ( $js as $s ) { ?>
	<script src="<?=BWG_ROOT; ?>/assets/<?= $s; ?>"></script>
<?php } ?>
</body>
</html>
