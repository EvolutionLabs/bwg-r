<?php
$dd = [
	'id' => '5027952011316',
	'Name' => ['Glenn\'s Vodka','Spaghetti Sauce', 'Sugar for my honey','This is a very long product name ready to help us style'],
	'Rank' => '12',
	'RSP' => '12.99',
	'Margin' => '21%',
	'Pack<br />/Case' => '280g/12',
	'Price' => [
		'old' => '€20.50',
	    'new' => '16.50'
	],
    'Details' => [
    	'image' => '/assets/image/product.jpg',
        'Description' => 'Lorem ipsum dolor sit amet, albucius salutatus an pri, ei reque impetus fabellas sea. Ad sit congue ocurreret constituto, quaestio similique id vel. Quidam platonem intellegebat qui an. Quod repudiandae ne vel.',
        'Code' => '123456',
	      'EAN' => '5027952011316',
        'TUC' => '5027952011316',
        'On order' => '13',
        'Start date' => '12/2/2016',
        'Price increase' => '14/11/2016',
        'Pallet Qty.' => '14/11/2016',
        'VAT' => '13.5%',
        'Supplier' => '14/11/2016',
	      'Shelf life' => '12days'
    ]
];
$filters = [
	[
		'name' => 'Top Sellers',
	    'icon' => 'fa bwg-i-top-sellers'
	],[
		'name' => 'Plus Top Sellers',
	    'icon' => 'fa bwg-i-top-sellers-plus'
	],[
		'name' => 'Group Top',
	    'icon' => 'fa bwg-i-group-top'
	],[
		'name' => 'My Top Sellers',
	    'icon' => 'fa bwg-i-my-top-sellers'
	],[
		'name' => 'My products',
	    'icon' => 'fa bwg-i-my-products',
	],[
		'name' => 'Category Man.',
	    'icon' => 'fa bwg-i-category-man'
	],[
		'name' => 'Trade show',
	    'icon' => 'fa bwg-i-trade-show'
	],[
		'name' => 'Back in stock',
	    'icon' => 'fa bwg-i-back-in-stock'
	],[
		'name' => 'Clearance',
		'icon' => 'fa bwg-i-clearance'
	],[
		'name' => 'Own Brand',
	    'icon' => 'fa bwg-i-own-brand'
	],[
		'name' => 'Promotions',
		'icon' => 'fa fa-tag'
	],[
		'name' => 'Handbill',
	    'icon' => 'fa fa-file'
	],[
		'name' => 'Top FoodM/Conv.',
    'icon' => 'fa bwg-i-top-food-m'
	],[
		'name' => 'New Product',
		'icon' => "fa bwg-i-new-product"
	],[
		'name' => 'New Listing',
		'icon' => 'fa bwg-i-new-listing'
	],[
		'name' => 'Core',
		'icon' => 'fa fa-dot-circle-o'
	],[
		'name' => 'Cycle',
		'icon' => 'fa bwg-i-cycle'
	],[
		'name' => 'Multi-buy',
		'icon' => 'fa bwg-i-multi-buy'
	],[
		'name' => 'Recommended',
		'icon' => 'fa fa-thumbs-up'
	],[
		'name' => 'All Products',
		'icon' => 'fa bwg-i-all-products'
	],[
		'name' => 'All Promotions',
		'icon' => 'fa fa-tags'
	],[
		'name' => 'Small Case',
		'icon' => 'fa bwg-i-small-case'
	],[
		'name' => 'Mixed Case',
		'icon' => 'fa bwg-i-mixed-case'
	],[
		'name' => "Mix and Match",
		'icon' => 'fa bwg-i-mix-and-match'
	],[
		'name' => 'Value Line',
		'icon' => 'fa fa-eur'
	],[
		'name' => 'Monday Madness',
		'icon' => 'fa bwg-i-monday-madness'
	]
];
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
<div class="submenu <?= $_GET['category']; ?>">
	<div class="container">
		<nav class="navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-secondary" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-brand"><?= $category;?></span>
				</div>
				<div id="navbar-secondary" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="#promotions" class="btn btn-default btn-sm">Promotions</a></li>
						<li><a href="#favorites" class="btn btn-default btn-sm active">Favorites</a></li>
						<li><a href="#program" class="btn btn-default btn-sm">Program</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<div class="dropdown filtersDd">
								<a href="#" id="dropdownFilters" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sr-only">Filters</span><i class="fa fa-chevron-down fa-2x"></i>
								</a>
								<div class="megaMenu dropdown-menu" aria-labelledby="dropdownFilters">
									<div class="container">
										<div class="filtersList">
											<?php
											foreach ($filters as $f) {
												$slug = makeSlug($f['name']);
												?>
												<span>
													<input type="checkbox" id="filters[<?= $slug; ?>]" name="filters[<?= $slug; ?>]" /><!--
													--><span class="fake"></span><!--
													--><label for="filters[<?= $slug; ?>]">
														<i class="<?= $f['icon']; ?>"></i><?= $f['name']; ?>
													</label>
												</span>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown iconsDd">
								<button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownIcons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<i class="fa fa-info-circle"></i>
									Icons guide
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownIcons">
									<?php
										foreach ($filters as $f) { ?>
										<li><i class="<?= $f['icon']; ?>"></i><?= $f["name"]; ?></li>
									<?php } ?>
								</ul>
							</div>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	</div>
</div>

<div class="container dull">
	<div class="row">
		<div class="col-md-9 col-sm-12 col-main">
			<div class="card transparent">
				<div class="cardTitle">
					<span class="filters">Filter by:</span>
					<div class="btn-group dropdown">
						<a href="#" onclick="javascript:void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddDepartment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Department
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="ddDepartment">
							<li><a class="dropdown-item" href="#">Department 1</a></li>
							<li><a class="dropdown-item" href="#">Department 2</a></li>
							<li><a class="dropdown-item" href="#">Department 3</a></li>
						</ul>
					</div>
					<div class="btn-group dropdown">
						<a href="#" onclick="javascript:void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddGroup" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Group
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="ddGroup">
							<li><a class="dropdown-item" href="#">Group 1</a></li>
							<li><a class="dropdown-item" href="#">Group 2</a></li>
							<li><a class="dropdown-item" href="#">Group 3</a></li>
						</ul>
					</div>
					<div class="btn-group dropdown">
						<a href="#" onclick="javascript:void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Category
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="ddCategory">
							<li><a class="dropdown-item" href="#">Category 1</a></li>
							<li><a class="dropdown-item" href="#">Category 2</a></li>
							<li><a class="dropdown-item" href="#">Category 3</a></li>
						</ul>
					</div>
					<span class="pull-right layoutSwitch">
						View as:
						<a class="btn btn-clear btn-sm active" href="#view-list" data-target="#productsTable"><i class="fa fa-list"></i></a>
						<a class="btn btn-clear btn-sm" href="#view-boxes" data-target="#productsTable"><i class="fa fa-th"></i></a>
					</span>
				</div>
				<table class="table products flex-table" id="productsTable">
					<thead>
					<tr>
						<?php
						foreach ( $dd as $k => $v ) {
							if (in_array($k, ['id','Price','Details']))
								continue;
							echo '<th>'.$k.'<a href="#"><i class="fa fa-sort"></i></a></th>';
						}
						echo '<th>Price</th><th colspan="3" class="pusher"></th>'
						?>
					</tr>
					</thead>
					<?php
					for ($i = 0; $i < 12; $i++) {
						include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."product-row.php";
					} ?>
				</table>
			</div>
			<div class="pagination">
				<span class="count">
					Items 56 of 4694
				</span>
				<div>
					<div class="btn-group">
						<a class="btn btn-white" href="#">Previous</a>
						<a class="btn btn-white" href="#">1</a>
						<a class="btn btn-white" href="#">2</a>
						<a class="btn btn-white" href="#">3</a>
						<span class="btn btn-disabled">4</span>
						<a class="btn btn-white" href="#">5</a>
					</div>
					<span class="bgn-group-spacer">&hellip;</span>
					<div class="btn-group">
						<a class="btn btn-white" href="#">20</a>
						<a class="btn btn-white" href="#">Next</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
