<?php

use parts\product\TableView;


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
			$favLists = [
				'Monday Orders',
				'Tuesday Orders',
				'Christmas Orders',
				'Weekend Stock',
				'Wine Stock'
			];
			?>
			<div class="simpleList clear">
				<div class="cardTitle">
					<h1><?= $category ;?> Favorite Lists</h1>
				</div>
				<ul>
				<?php
				foreach ( $favLists as $favList ) {
					$table = new TableView([
						'id'         => makeSlug( $favList ),
						'minProds'  => 3,
						'maxProds'  => 5,
						'filters'    => false,
						'pagination' => false
					]);
					?>
					<li>
						<a class="listTitleLink" role="button" data-toggle="collapse" href="#list-<?= $table->id; ?>" aria-expanded="false" aria-controls="list-<?= $table->id; ?>"">
								<?= $favList ;?>
						<span class="toggLer"><i class="fa fa-2x fa-chevron-down"></i></span>
						</a>
						<div class="collapse" id="list-<?= $table->id;?>">
							<div>
								<?php
								include dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "product". DIRECTORY_SEPARATOR.  "product-table.php";
								?>
							</div>
						</div>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
