<?php
use parts\product\TableView;
global $category;
$category = isset($_GET['category']) ? $_GET['category'] : 'alcohol';

?>
<div class="parallax-container">
	<div style="background: #eee url('../../assets/image/banner.jpg') no-repeat 50% 50% /cover;" class="parallax-scroller">
		<div class="scene container">
			<h3>New Season Offers</h3>
			<div class="subtitle">2 Cases for the price of 1</div>
			<a href="#" class="btn btn-success">Buy Now</a>
		</div>
	</div>
</div>
 <?php
 include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."filters.php"
 ?>
<div class="container dull">
	<div class="row">
		<div class="col-md-9 col-sm-12 col-main">
			<?php
			$table = new TableView();

			include dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR."product".DIRECTORY_SEPARATOR . "product-table.php";
			?>
		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
