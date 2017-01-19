<?php
/**
 * $table TableView
 */
?>
<div class="card transparent">
	<?php
	/**
	 * Filters
	 */
	if ( $table->filters ) {
		if ( is_string( $table->filters ) ) {
			echo $table->filters;
		} else {
			?>
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
			<?php
		}
	} /** end of Filters */

	?>
	<table class="table products flex-table" id="productsTable">
		<?php
		/**
		 * Header
		 */
		if ($table->header) {
			if ( is_string( $table->header ) ) {
				echo $table->header;
			} else {
				?>
				<thead>
				<tr>
					<?php
					foreach ( $table->cols as $col ) {
						echo '<th>' . $col . '<a href="#"><i class="fa fa-sort"></i></a></th>';
					}
					echo '<th colspan="3" class="pusher"></th>'
					?>
				</tr>
				</thead>
				<?php
			}
		}
		/** end of Header */

		/**
		 * Body
		 */
		foreach ($table->products as $product) {
			include "product-row.php";
		} /** end of Body */

		/**
		 * Footer
		 */
		if ($table->footer) {
			if ( is_string( $table->footer ) ) {
				echo $table->footer;
			} else {
				?>
				<tfoot>
				<tr>
					<td colspan="<?= $table->colspan; ?>">
						<div class="text-right">
							<a href="#" class="btn btn-default btn-outline btn-sm">Add selection to cart</a>
						</div>
					</td>
				</tr>
				</tfoot>
			<?php
			}
		} /** end of Footer */

		?>
	</table>
</div>
<?php
/**
 * Pagination
 */
if ( $table->pagination ) {
	if ( is_string( $table->pagination ) ) {
		echo $table->pagination;
	} else {
		?>
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
<?php
	}
} /** end of Pagination */