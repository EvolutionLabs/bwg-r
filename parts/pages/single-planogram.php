<?php

use parts\product\TableView;

$category = isset($_GET['category']) ? $_GET['category'] : 'bond';

$images = [
	'planogram_3.jpg',
]
?>

<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."parallax.php" ;?>
<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."filters.php" ;?>

<div class="container dull">
	<div class="row">
		<div class="col-md-9 col-sm-12 col-main">
			<div class="planogram single-planogram">
				<?php
				$sh = $images;
				shuffle($sh);
				foreach ($sh as $image) { ?>
					<a href="/assets/image/<?= $image;?>" class='imgSlot'>
						<img src='/assets/image/<?= $image;?>' />
					</a>
				<?php } ?>
			</div>
			<?php
			$table = new TableView([
				"id" => "productsTable"
			]);
			include dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR."product".DIRECTORY_SEPARATOR . "product-table.php";
			?>
		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
