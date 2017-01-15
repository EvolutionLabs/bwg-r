<?php if ($loggedIn) { ?>
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
<?php } else { ?>
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

