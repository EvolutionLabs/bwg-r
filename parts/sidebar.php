<?php $dd = [
	'Product' => [
		'Chocolate Croissants x 24',
		'Chocolate Chip 20 packs x 13',
		'Mister Kipling Cupcakes x 9'
	],
	'Qty.'    => [ 12, 2, 9 ],
	'Cost'    => [
		'€16.50',
		'€6.50',
		'€10.50'
	]
]; ?>

<div class="card cart">
	<h4 class="title">Current Order</h4>
	<table class="table">
		<thead>
		<tr>

			<?php
			foreach ( $dd as $k => $v ) {
				echo '<th>' . $k . '</th>';
			}
			?>
		</tr>
		</thead>

		<?php
		for ( $i = 0; $i < count( array_values( $dd )[0] ); $i ++ ) { ?>
			<tr>
				<td><?= $dd['Product'][ $i ]; ?></td>
				<td><?= $dd['Qty.'][ $i ]; ?></td>
				<td><?= $dd['Cost'][ $i ]; ?></td>
			</tr>
		<?php } ?>
		<tfoot>
		<tr>
			<td colspan="2">Total (excluding VAT)</td>
			<td>€33.50</td>
		</tr>
		</tfoot>
	</table>
	<a href="#" class="btn btn-block btn-primary">Checkout</a>

</div>