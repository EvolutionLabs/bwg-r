<?php if ($loggedIn) {
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

	$modal = isset($modal) ? $modal : '';
	ob_start();
	?>
	<div class="modal fade" tabindex="-1" role="dialog" id="hhtErrorsModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-default">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">HHT Orders</h4>
				</div>
				<div class="modal-body">
					<?php
					$tabs = [];
					foreach ($hhtErrors as $name => $errors) {
						$times = rand(0,5);
						$tab = '';
						if ($times) {
							$tab .= '<div class="hhtError">';
							for ($i = 0; $i < $times +1; $i++) {
								$tab .= ($i ? '<hr />':'');
								$tab .= '<p class="error-body">'.$errors[rand(0, count($errors) - 1)].'</p>';
							}
							$tab .="</div>";
						} else {
							$tab .= "<div class='hhtError no-errors'>No $name errors.</div>";
						}
						$tabs[$name] = [
							'body' => $tab,
							'count' => $times
						];
					}
					?>
					<ul class="nav nav-tabs" role="tablist">
						<?php
						$tabPanes = '<div class="tab-content">';
						$index = 0;
						foreach ($tabs as $name => $section) { ?>
							<li role="presentation" class="<?= $index ?: 'active';?>">
								<a href="#t-<?= $name;?>" aria-controls="t-<?= $name;?>"
								   role="tab" data-toggle="tab"><?= $name;?>
									<span class="badge"><?=$section['count'] ;?></span>
								</a>
							</li>
						<?php
							$tabPanes .= "<div role='tabpanel' class='tab-pane" .
							             ( $index++ ?: ' in active' ) . "' id='t-$name'>{$section['body']}</div>";

						}
						$tabPanes .= '</div>';
						?>
					</ul>
					<?= $tabPanes ;?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<?php
	$modal .= ob_get_clean();
	?>
	<div class="shop-links">
		<div class="loader"></div>
		<div>
			<span><a href="/section?category=ambient" class="ambient">Ambient</a></span>
			<span><a href="/section?category=chill" class="chill">Chill</a></span>
			<span><a href="/section?category=alcohol" class="alcohol">Alcohol</a></span>
			<span><div class="dropdown dropup">
					<a href="#" class="centre dropdown-toggle" data-toggle="dropdown" id="centreDd">Value Centre</a>
					<ul class="dropdown-menu" aria-labelledby="centreDd">
						<li><a href="#">Option 1</a></li>
						<li><a href="#">Option 2</a></li>
						<li><a href="#">Option 3</a></li>
						<li><a href="#">Option 4</a></li>
					</ul>
				</div>
			</span>
		</div>
	</div>

<?php
	echo $modal;
	echo '<a href="#" class="hhtErrToggle btn btn-white btn-outline"
data-toggle="modal" data-target="#hhtErrorsModal">HHT Orders</a>';


} else { ?>
	<div class="card login">
		<h4>Sign in</h4>
		<form method="post">
			<input type="hidden" name="login" />
			<input placeholder="Username" type="text" name="username" required="">
			<input placeholder="Password" type="password" name="password" required="">
			<button class="btn btn-primary btn-block">Submit</button>
		</form>
	</div>

<?php } ?>

