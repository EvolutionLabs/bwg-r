<?php $isCart = $template == 'cart'; ?>
<tr data-toggle="collapse" data-target="#tr-<?=$dd['id'] ;?>" class="accordion-toggle" aria-expanded="false">
	<?php
	$name = getRand($dd['Name']);
	foreach ($dd as $k => $v) {
		if (in_array($k, ['id','Price','Details']))
			continue;
		$val = is_array($v)? $v[rand(1,count($v) - 1)] : $v;
		$onOffer = '';
		if ($k == 'Name') {

			$rand = (float)rand()/(float)getrandmax();
			$onOffer .= ($rand < 0.33 ? '
										<div class="offerWrap">
											<i class="fa fa-tag"></i>
											<div class="offerTag">
												<span class="tagTitle">30% OFF</span>
												<span class="tagDtail">End date</span>
												<span class="tagDate">1/2/17</span>
											</div>
										</div>
									' : '');
		}
		echo '<td><div class="rltv">'.$onOffer.($k == 'Name' ? $name : $val).'</div></td>';
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
		<a href="#<?= $isCart ? 'remove-from-' : 'add-to-' ;?>cart?id=<?= $dd['id'] ;?>"
		   onclick="javascript:void(0)" class="btn btn-cart btn-sm <?= $isCart ? 'btn-danger':'btn-success' ;?>">
			<i class="fa fa-2x bwg-i-cart"></i>
		</a>
	</td>
</tr>
<tr class="hiddenRow">
	<td colspan="9">
		<div class="collapse" id="tr-<?= $dd['id'] ;?>" style="overflow: hidden; clear: both;">
			<div class="tdWrapper">
				<div class="imageWrap"><img class="img-responsive" src="<?= $dd['Details']['image'] ;?>" /></div>
				<div class="main-col">
					<div>
						<div class="p-Title"><?= $name ;?></div>
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
					<div class="btn-group btn-group-sm separate productActions">
						<div class="bar-rating">
							<select id="rating-<?= $dd['id'] ;?>">
								<option>0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="dropdown dropup">
							<a href="#" class="btn btn-sm btn-outline btn-default dropdown-toggle"
							   title="Add product to favorites"
							   aria-haspopup="true" aria-expanded="false"
							   data-toggle="dropdown" id="dropdownFavorites"
							><i class="fa fa-star"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdownFavorites">
								<li><a href="#">Fav list 1</a></li>
								<li><a href="#">Fav list 2</a></li>
								<li><a href="#">Fav list 3</a></li>
								<li><a href="#">Fav list 4</a></li>
								<li><a href="#">Fav list 5</a></li>
							</ul>
						</div>
						<div class="dropdown dropup">
							<a href="#" class="btn btn-sm btn-outline btn-default dropdown-toggle"
							   title="Promote this product"
							   aria-haspopup="true" aria-expanded="false"
							   data-toggle="dropdown" id="dropdownPromote"
							><i class="fa fa-thumbs-up"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdownPromote">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">First action again</a></li>
								<li><hr class="divider"></li>
								<li><a href="#">Never mind</a></li>
							</ul>
						</div>
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
						<a href="#<?= $isCart ? 'remove-from-' : 'add-to-' ;?>cart?id=<?= $dd['id'] ;?>"
						   onclick="javascript:void(0)" class="btn <?= $isCart ? 'btn-cart btn-inverse':'btn-success' ;?> btn-block">Remove</a>
						<a href="#" class="btn btn-default btn-stock btn-block accordion-toggle btn-outline" data-toggle="collapse" data-target="#stock-<?= $dd['id']; ?>">View Stock Card</a>
					</div>
				</div>
			</div>
		</div>
		<div class="collapse" id="stock-<?= $dd['id'] ;?>">
			<div class="tdWrapper"><!--Don't remove this wrapper, it's needed for smooth animation !-->
				Stock card here
			</div>
		</div>
	</td>
</tr>

<?php
$string = substr($dd['id'], 0, strlen($dd['id']) -7 ) . strval(intval(substr($dd['id'], -7)) + 1);
$dd['id'] = $string;