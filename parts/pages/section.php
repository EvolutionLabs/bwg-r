<?php
use parts\product\TableView;
global $category;
$category = isset($_GET['category']) ? $_GET['category'] : 'bond';

include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."parallax.php";

$filters = true;
include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."filters.php";

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
