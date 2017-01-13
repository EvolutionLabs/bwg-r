<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
			        aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="../assets/image/logo.png" /><div class="sr-only">Shoplink</div></a>
		</div>
		<?php if ($loggedIn) { ?>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav nav-search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search Products">
					<span class="input-group-addon">
                        <button type="submit">
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
				</div>
				<a href="#" class="btn btn-search">Custom search</a>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" title="Layout"><i class="fa fa-2x fa-th-large"></i><span class="sr-only">Layout</span></a></li>
				<li><a href="#" title="Favorites"><i class="fa fa-2x fa-heart"></i><span class="sr-only">Favorites</span></a></li>
				<li><a href="#" title="Settings"
				       class="dropdown-toggle" id="dropdownSettings"
				       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
					><i class="fa fa-2x fa-cog"></i><span class="sr-only">Settings</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownSettings">
						<li><a href="#">Current Order</a></li>
						<li><a href="/past-orders">Past Orders</a></li>
						<li><a href="/hht-orders">HHT Orders</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Help</a></li>
						<li role="separator" class="divider"></li>
						<form action="/" method="post">
							<button name="logout" value="true" title="Sign out"><i class="fa fa-sign-out"></i>Sign Out</button>
						</form>
						<li><div class="info"><?= $_SESSION['username'];?> 1234</div></li>
					</ul>
				</li>
				<li><a href="#" title="Cart"><i class="fa fa-2x fa-shopping-cart"></i><span class="sr-only">Cart</span></a></li>
			</ul>
		</div><!--/.nav-collapse -->
		<?php } ?>
	</div>
</nav>