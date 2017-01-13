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
$filters = [
	[
		'name' => 'Top Sellers',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Plus Top Sellers',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Group Top',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'My Top Sellers',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'My products',
		'icon' => 'fa fa-circle-thin',
	],[
		'name' => 'Category Man.',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Trade show',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Back in stock',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Promotions',
		'icon' => 'fa fa-tag'
	],[
		'name' => 'Own Brand',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Clearance',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Handbill',
		'icon' => 'fa fa-file'
	],[
		'name' => 'Top FoodM/Conv.',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'New Product',
		'icon' => "fa fa-circle-thin"
	],[
		'name' => 'New Listing',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Core',
		'icon' => 'fa fa-dot-circle-o'
	],[
		'name' => 'Cycle',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Multibuy',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Recommended',
		'icon' => 'fa fa-thumbs-up'
	],[
		'name' => 'All Products',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Small Case',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Mixed Case',
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => "Mix and Match",
		'icon' => 'fa fa-circle-thin'
	],[
		'name' => 'Value Line',
		'icon' => 'fa fa-eur'
	],[
		'name' => 'Monday Madness',
		'icon' => 'fa fa-calendar-o'
	],[
		'name' => 'All Products',
		'icon' => 'fa fa-circle-thin'
	]
];
$category = isset($_GET['category']) ? $_GET['category'] : 'alcohol';

function makeSlug($name) {

	$rule = 'NFD; [:Nonspacing Mark:] Remove; NFC';
	$myTrans = \Transliterator::create($rule);
	$name = $myTrans->transliterate($name);
	$name = strtolower($name);

	preg_match_all('([a-z0-9]+)', $name, $matches);
	if (is_array($matches) && isset($matches[0]) && count($matches[0])) {
		return implode('-', $matches[0]);
	}
	else
		return null;
}

?>
<div class="container dull">
	<div class="row">
		<div class="col-md-9 col-sm-12 col-main">
			<div class="card transparent">
				<table class="table products flex-table">
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
					for ($i = 0; $i < 7; $i++) { ?>
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
							<td>
								<span class="placer">
									<i class="fa fa-heart-o fa-2x"></i>
									<i class="fa fa-heart fa-2x"></i>
								</span></td>
							<td class="no-grow hide-x">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-plus"></i>
									</span>
									<input type="text" class="form-control" value="1" name="qty-<?= $dd['id'] ;?>" />
									<span class="input-group-addon">
										<i class="fa fa-minus"></i>
									</span>
								</div>
							</td>
							<td class="no-grow hide-x">
								<a href="#remove-from-cart?id=<?= $dd['id'] ;?>" onclick="javascript:void(0)" class="btn btn-cart btn-sm btn-inverse">
									<i class="fa fa-2x bwg-i-cart"></i>
								</a>
							</td>
						</tr>
						<tr class="hiddenRow">
							<td colspan="10">
								<?php
								$rand = (float)rand()/(float)getrandmax();
								if ($rand < 0.33) { ?>
									<div class="offerWrap">
										<div class="offerTag">
											<span class="tagTitle">30% OFF</span>
											<span class="tagDtail">End date</span>
											<span class="tagDate">1/2/17</span>
										</div>
									</div>
								<?php } ?>
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
											</div>
										</div>
										<div class="right-col">
											<div class="iconBar">
												<i class="fa fa-2x fa-star"></i>
												<i class="fa fa-2x fa-exclamation-circle"></i>
												<i class="fa fa-2x fa-file"></i>
												<i class="fa fa-2x fa-tag"></i>
											</div>
											<div class="rltv">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-plus"></i>
													</span>
													<input type="text" class="form-control" value="1" name="qty-<?= $dd['id'] ;?>" />
													<span class="input-group-addon">
														<i class="fa fa-minus"></i>
													</span>
												</div>
												<a href="#remove-from-cart?id=<?= $dd['id'] ;?>" onclick="javascript:void(0)" class="btn btn-cart btn-inverse btn-block">Remove</a>
												<a href="#" class="btn btn-default btn-stock btn-block accordion-toggle" data-toggle="collapse" data-target="#stock-<?= $dd['id']; ?>">View Stock Card</a>
											</div>
										</div>
									</div>
								</div>
								<div class="collapse" id="stock-<?= $dd['id'] ;?>">
									<div><!--Don't remove this wrapper, it's needed for smooth animation !-->
										Stock card here
									</div>
								</div>
							</td>
						</tr>

						<?php
						$string = substr($dd['id'], 0, strlen($dd['id']) -7 ) . strval(intval(substr($dd['id'], -7)) + 1);
						$dd['id'] = $string;
					} ?>
				</table>
				<div class="afterFlexTable">
					<div class="flexRow">
						<div class="flexCol">
							<h4>Promotions</h4>
							<dl class="dl-horizontal">
								<dt>Percentage Saving</dt>
								<dd>14%</dd>
								<dt>Cash Saving</dt>
								<dd>€2.56</dd>
							</dl>

							<div class="btn-group">
								<a href="#" class="btn btn-success">Continue Shopping</a>
								<a href="#" class="btn btn-default">Erase Cart</a>
							</div>
						</div>
						<div class="flexCol well">
							<h4>Total <span class="pull-right">€45.50</span></h4>
							<dl class="dl-horizontal">
								<dt>Order reference</dt>
								<dd>09876</dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Estimated delivery</dt>
								<dd>26/04/17</dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Estimated delivery</dt>
								<dd>26/04/17</dd>
							</dl>
							<a href="#checkout" class="btn btn-primary">Send order</a>
						</div>
					</div>

				</div>
			</div>


		</div>
		<div class="col-md-3 col-sm-12 aside">
			<?php include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."sidebar.php"; ?>
		</div>
	</div>
</div>
