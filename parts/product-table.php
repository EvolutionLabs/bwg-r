<div class="card transparent">
	<?php if ( $table['filters'] ) { ?>
		<div class="cardTitle">
			<span class="filters">Filter by:</span>
			<div class="btn-group dropdown">
				<a href="#" onclick="void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddDepartment"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
				<a href="#" onclick="void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddGroup"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
				<a href="#" onclick="void(0)" class="btn btn-secondary btn-sm dropdown-toggle" role="button" id="ddCategory"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
						<a class="btn btn-clear btn-sm active" href="#view-list" data-target="#productsTable"><i
								class="fa fa-list"></i></a>
						<a class="btn btn-clear btn-sm" href="#view-boxes" data-target="#productsTable"><i class="fa fa-th"></i></a>
					</span>
		</div>
	<?php } ?>
	<table class="table products flex-table" id="productsTable">
		<?php if ($table['header']) { ?>
			<thead>
			<tr>
				<?php
				foreach ( $dd as $k => $v ) {
					if ( in_array( $k, [ 'id', 'Price', 'Details' ] ) ) {
						continue;
					}
					echo '<th>' . $k . '<a href="#"><i class="fa fa-sort"></i></a></th>';
				}
				echo '<th>Price</th><th colspan="3" class="pusher"></th>'
				?>
			</tr>
			</thead>
		<?php
		}
		for ( $i = 0; $i < rand( $table['min-prods'], $table['max-prods'] ); $i ++ ) {
			include "product-row.php";
		} ?>
	</table>
</div>
<?php if ( $table['pagination'] ) { ?>
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
<?php }