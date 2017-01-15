<script src="../assets/vendor/jquery/jquery-2.2.4.min.js"></script>
<script src="../assets/vendor/velocity/velocity.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script src="../assets/vendor/toastr/toastr.min.js"></script>
<script src="../assets/vendor/bootstrap/js/ie10-viewport-bug-workaround.js"></script>
<?php
foreach ( $js as $s ) { ?>
	<script src="../assets/js/<?= $s; ?>"></script>
<?php } ?>
</body>
</html>
