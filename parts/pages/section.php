<?php
$dd = [
	'id' => '5027952011316',
	'Name' => 'Glenn\'s Vodka',
	'Rank' => '12',
	'RSP' => '12.99',
	'Margin' => '21%',
	'Pack/Case' => '280g/12',
	'Price' => [
		'old' => '€20.50',
	    'new' => '16.50'
	],
    'Details' => [
    	'image' => '/assets/image/product.jpg',
        'Description' => 'Lorem ipsum dolor sit amet, albucius salutatus an pri, ei reque impetus fabellas sea. Ad sit congue ocurreret constituto, quaestio similique id vel. Quidam platonem intellegebat qui an. Quod repudiandae ne vel.',
        'EAN' => '5027952011316',
        'TUC' => '5027952011316',
        'On order' => '13',
        'Start date' => '12/2/2016',
        'Price increase' => '14/11/2016',
        'Pallet Qty.' => '14/11/2016',
        'VAT' => '13.5%',
        'Supplier' => '14/11/2016',
    ]
];
$category = isset($_GET['category']) ? $_GET['category'] : 'alcohol'
?>
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
						<li><a href="#program" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i>Icon guide</a></li>
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
					<div class="btn-group">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="ddDepartment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Department
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="ddDepartment">
							<li><a class="dropdown-item" href="#">Department 1</a></li>
							<li><a class="dropdown-item" href="#">Department 2</a></li>
							<li><a class="dropdown-item" href="#">Department 3</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="ddGroup" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Group
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="ddGroup">
							<li><a class="dropdown-item" href="#">Group 1</a></li>
							<li><a class="dropdown-item" href="#">Group 2</a></li>
							<li><a class="dropdown-item" href="#">Group 3</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="ddCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Department
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="ddCategory">
							<li><a class="dropdown-item" href="#">Category 1</a></li>
							<li><a class="dropdown-item" href="#">Category 2</a></li>
							<li><a class="dropdown-item" href="#">Category 3</a></li>
						</ul>
					</div>
					<span class="pull-right filters">
						View as:
						<a class="btn btn-clear active" href="#"><i class="fa fa-list"></i></a>
						<a class="btn btn-clear" href="#"><i class="fa fa-list"></i></a>
					</span>
				</div>
				<table class="table">
					<thead>
					<tr>
						<?php
						foreach ( $dd as $k => $v ) {
							if (in_array($k, ['id','Price','Details']))
								continue;
							echo '<th>'.$k.'<a href="#"><i class="fa fa-sort"></i></a></th>';
						}
						echo '<th>Price</th><th></th>'
						?>
					</tr>
					</thead>
					<?php
					for ($i = 0; $i < 12; $i++) { ?>
						<tr data-toggle="collapse" data-target="#tr-<?=$dd['id'] ;?>" class="accordion-toggle">
							<?php
							foreach ($dd as $k => $v) {
								if (in_array($k, ['id','Price','Details']))
									continue;
								echo '<td>'.$v.'</td>';
							}
							?>
							<td class="price">
								<span class="old"><?= $dd['Price']['old'];?></span> <?= $dd['Price']['new'];?>
							<td >
								<i class="fa fa-heart-o"></i></a></td>
						</tr>
						<tr class="hiddenRow">
							<td colspan="8">
								<div class="collapse" id="tr-<?= $dd['id'] ;?>" style="overflow: hidden; clear: both;">
									<div class="tdWrapper">
										<div class="imageWrap"><img class="img-responsive" src="<?= $dd['Details']['image'] ;?>" /></div>
										<div class="main-col">
											<div>
												<div class="p-Title"><?= $dd['Name'] ;?></div>
												<p class="p-Description"><?= $dd['Details']['Description'] ;?></p>
											</div>
											<div class="p-Details">
												<?php
												foreach ($dd['Details'] as $k => $value) {
													if (in_array($k, ['image', 'Description']))
														continue;
													?>
													<div>
														<span class="key"><?= $k ;?></span>
														<span class="value"><?= $value ;?></span>
													</div>
												<?php } ?>
												<a href="#" class="btn btn-default btn-sm">View Stock Card</a>
											</div>
										</div>
										<div class="right-col">
											right column

										</div>
									</div>
								</div>
							</td>
						</tr>

					<?php
						$string = substr($dd['id'], 0, strlen($dd['id']) -7 ) . strval(intval(substr($dd['id'], -7)) + 1);
						$dd['id'] = $string;
					} ?>
				</table>
			</div>
			<div class="pagination">
				<span class="count">
					Items 56 of 4694
				</span>
				<div class="btn-group">
					<a class="btn btn-white" href="#">Previous</a>
					<a class="btn btn-white" href="#">1</a>
					<a class="btn btn-white" href="#">2</a>
					<a class="btn btn-white" href="#">3</a>
					<a class="btn btn-white" href="#">4</a>
					<a class="btn btn-disabled" href="#">5</a>
					<a class="btn btn-white" href="#">6</a>
					<a class="btn btn-white" href="#">Next</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
