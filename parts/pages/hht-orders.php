<?php

$hhtErrors = [
	'Ambient' => [
		'674577, ACE PODS is discontinued, search for a replacement line in ShopLink.',
		'671239, CAD RICH TEA MILK CHOC is discontinued, search for a replacement line in ShopLink.',
		'680512, SPAR 6 CRUMB MINCE PIES is discontinued, search for a replacement line in ISIS.'
	],
	'Chill' => [
		'670827, NOMADIC MANGO LASSI is discontinued, search for a replacement line in ShopLink.'
	],
	'Bond' => [
		'677800, COCA COLA 1.25LTR is discontinued, search for a replacement line in ShopLink.',
		'671239, CAD RICH TEA MILK CHOC has no alcohol and has therefore been discontinued. Go home!',
		'677800, COCA COLA 1.25LTR has no alcohol and has therefore been discontinued. Go home!',
		'The system recovered from a serious error encountered while trying to display the following validation message: <code>"No errors found."</code>'
	]
];

$hhtOrders = [];

$default =

$dd = [
	'Order #' => '098675',
    'Delivery date' => '13/02/16',
    'Submission date' => '12/02/16',
    'Pack/Case' => '12/24',
    'Total' => '16.50',
    'Order Type' => '<a href="#!">Invoice 123456</a>'
]
?>

<div class="container dull">
	<div class="row">
		<div class="col-md-9 col-sm-12 col-main">
			<div class="card transparent">
				<div class="cardTitle">
					<span class="pull-right"><a href="#" class="btn btn-default btn-sm">Return to products</a></span>
					<h1>HHT Orders</h1>
				</div>
				<table class="table flex-table">
					<thead>
						<tr>
						<?php
						foreach ( $dd as $k => $v ) {
							echo '<th>'.$k.'<a href="#"><i class="fa fa-sort"></i></a></th>';
						}
						echo '<th></th><th></th>'
						?>
						</tr>
					</thead>
				<?php
				for ($i = 0; $i < 12; $i++) { ?>
					<tr data-toggle="collapse" data-target="#tr-<?=$dd['Order #'] ;?>" class="accordion-toggle">
						<?php
						foreach ($dd as $v) {
							echo '<td>'.$v.'</td>';
						}
						?>
						<td>
							<a href="#add-to-cart"><i class="fa fa-plus"></i></a></td>
						<td>
							<a href="#open" onclick="javascript:void(0)">
								<i class="fa fa-chevron-down"></i></a></td>
					</tr>
					<tr class="hiddenRow">
						<td colspan="8">
							<div class="collapse" id="tr-<?=$dd['Order #'] ;?>" style="overflow: hidden; clear: both;">
								<div class="tdWrapper">
									This is extra content
								</div>
							</div>
						</td>
					</tr>
				<?php
					$string = strval(intval($dd['Order #']) + 1);
					$dd['Order #'] = str_pad($string, 6, '0');
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
