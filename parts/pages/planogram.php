<?php

$category = isset($_GET['category']) ? $_GET['category'] : 'alcohol';

$images = [
	'planogram_1.jpg',
	'planogram_2.png',
	'planogram_3.jpg',
	'planogram_4.jpg',
	'planogram_5.jpg',
	'planogram_6.png',
]
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
<div class="submenu <?= $category;?> " id="planogram">
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
						<li><a href="#" class="btn btn-default btn-sm">Promotions</a></li>
						<li><a href="/favorites?category=<?= $category;?>" class="btn btn-default btn-sm active">Favorites</a></li>
						<li><a href="/section?category=<?= $category;?>" class="btn btn-default btn-sm">Section</a></li>
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
						<a href="#" onclick="void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddDepartment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
						<a href="#" onclick="void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddGroup" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
						<a href="#" onclick="void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Category
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="ddCategory">
							<li><a class="dropdown-item" href="#">Category 1</a></li>
							<li><a class="dropdown-item" href="#">Category 2</a></li>
							<li><a class="dropdown-item" href="#">Category 3</a></li>
						</ul>
					</div>
					<div class="pull-right layoutSwitch">
						View as:
						<ul role="tablist">
							<li role="presentation">
								<a class="btn btn-clear btn-sm active" href="#view-tiles"
								   aria-controls="view-tiles" role="tab" data-toggle="tab">
									<i class="fa fa-th"></i></a></li>
							<li role="presentation">
								<a class="btn btn-clear btn-sm" href="#view-list"
								   aria-controls="view-list" role="tab" data-toggle="tab">
									<i class="fa fa-list"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content">
				<div id="view-tiles" role="tabpanel" class="tab-pane fade in active">
					<div class="planogram">
						<?php
						$sh = $images;
						shuffle($sh);
						foreach ($sh as $image) { ?>
							<a href="/assets/image/<?= $image;?>" class='imgSlot'>
								<img src='/assets/image/<?= $image;?>' />
							</a>
						<?php } ?>
					</div>
				</div>
				<div id="view-list" role="tabpanel" class="tab-pane fade">
					<div class="simpleList">
						<ul>
							<?php
							foreach ($images  as $image) { ?>
								<li><a href='/assets/image/<?= $image;?>'><span class="btn btn-sm btn-primary pull-left"><i class="fa fa-image"></i></span>
										/assets/image/<?= $image;?>
										</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
