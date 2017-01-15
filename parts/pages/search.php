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

$category = isset($_GET['category']) ? $_GET['category'] : 'alcohol';

?>

<div class="container dull">
	<div class="row">
		<div class="col-md-9 col-sm-12 col-main">
			<div class="card page">
				<h2>Custom search</h2>

				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control form-control-lg" placeholder="Enter search keywords" />
					</div>
					<div class="form-group">
						<select class="selectpicker" title="Supplier"
						        data-style="btn-outline btn-white"
						        data-container="body"
						        data-width="300px"
						>
							<option>Supplier 1</option>
							<option>Supplier 2</option>
							<option>Supplier 3</option>
							<option>Supplier 4</option>
							<option>Supplier 5</option>
							<option>Supplier 6</option>
						</select>
					</div>
					<div class="form-group">
						<select class="selectpicker" title="Brand"
						        data-style="btn-outline btn-white"
						        data-container="body"
						        data-width="300px"
						>
							<option title="Brand 1">A brand</option>
							<option title="Brand 2">Another brand</option>
							<option title="Brand 3">Yet another brand</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<h4>Search tips</h4>
					<dl class="dl-horizontal">
						<dt>Regular:</dt>
						<dd>Type all the words you want to search</dd>
						<dt>Phrase match:</dt>
						<dd>Put exact words in quotes to search for an exact phrase.
							<code>Diet coke</code>
						</dd>
						<dt>Broad match:</dt>
						<dd>Type OR between all the words you want.
							<code>small OR mini</code>
						</dd>
						<dt>Negative match:</dt>
						<dd>Exclude words by putting a minus in front of them.
							<code>-"low fat"</code>
						</dd>
					</dl>
				</div>
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
