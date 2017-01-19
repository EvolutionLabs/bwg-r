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

for ($i = 0; $i < 10; $i++) {
	$dateTime = date('M d, Y H:i', rand(strtotime('15 August 2016'), strtotime('now')));
	$hht = [
		'errors' => generateHHT($hhtErrors),
		'dateTime' => $dateTime
	];
	$hht['summary'] = generateHhtSummary($hht['errors']);
	$hht['body'] = generateHhtBody($i, $hht['errors']);

	$hhtOrders[] = $hht;
}

function generateHhtSummary($errors) {
	$summary = [];
	$total = 0;
	foreach ($errors as $cat => $errs) {
		$summary[] = count($errs) . ' ' .$cat;
		$total += count($errs);
	}

	return implode($summary, ', ')." &mdash; ".$total." Errors";
}

function generateHhtBody ($id, $errors) {
	$out = '<ul class="nav nav-tabs" role="tablist">';
	$tabPanes = '<div class="tab-content">';
	$index = 0;
	foreach ($errors as $name => $errs) {
		$out .="<li role='presentation' class='".($index ?:'active')."'>".
		       "<a href='#t$id-$name' aria-controls='t$id-$name' role='tab' data-toggle='tab'>".
		       "$name<span class='badge'>".count($errs)."</span>".
		       "</a></li>";
		$tabPanes .= "<div role='tabpanel' class='tab-pane" .
		             ( $index++ ?: ' in active' ) . "' id='t$id-$name'>".
		             implode($errs, '<hr />') .
		             "</div>";
		}
		$tabPanes .= '</div>';
	$out .= "</ul>";

	return $out . $tabPanes;
}

function generateHHT ($hhtErrors){
	$errors = [];
	foreach ($hhtErrors as $name => $errs) {
		$errors[$name] = [];
		for ($i = 0; $i < rand(0,5); $i++) {
			$errors[$name][] = $errs[rand(0, count($errs) - 1)];
		}
	}

	return $errors;
}

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
				<div class="simpleList clear" id="hhtList">
					<ul>
						<?php
						foreach ($hhtOrders  as $k => $hhtOrder) { ?>
							<li>
								<a href="#hhtO-<?= $k;?>" data-toggle="collapse">
									<span class="hhtDate"><?= $hhtOrder['dateTime'];?></span>
									<span class="hhtSummary"><?= $hhtOrder['summary'];?></span>
									<span class="toggLer"><i class="fa fa-2x fa-chevron-down"></i></span>
								</a>
								<div id="hhtO-<?= $k;?>" class="collapse">
										<?= $hhtOrder['body']; ?>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>

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
