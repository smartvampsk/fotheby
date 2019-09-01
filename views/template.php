<!DOCTYPE html>
<html>
	<head>
		<title> <?php echo $title; ?> </title>
		<link rel="stylesheet" href="../css/style.css"/>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/header.js"></script>
	</head>
	<body>		
		<header class="nav-head fixed-top">
		    <div class="container-fluid border-bottom p-2 bg-light border-secondary">
				<div class="nav-top text-right pr-2 mr-1">
					<a class="nav-item pr-2" href="about">About</a>
					<a class="nav-item pr-2" href="contact">Contact</a>
					<?php
						if (isset($_SESSION['logged_user_id'])) {
							echo '<a class="nav-item pr-2 active" href="view_profile?user_id='.$_SESSION['logged_user_id'].'">Profile</a>';
							echo '<a class="nav-item pr-2 active" href="logout">Logout</a>';
						}
						else{
							echo '<a class="nav-item pr-2" href="apply">Apply</a>';
							echo '<a class="nav-item pr-2 active" href="login">Login</a>';
						}
					?>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="col-md-4">
					<a class="navbar-brand" href="home">
						<img src="../images/logo.jpg" class="d-inline-block align-top mr-0" alt="Fotheby's Auction House Logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
		      	<div class="collapse navbar-collapse">
		        	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		            	<li class="nav-item active">
		                	<a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
		            	</li>
		            	<li class="nav-item">
		                	<a class="nav-link" href="item">Auction</a>
		            	</li>
		            	<li class="nav-item dropdown">
		                	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Items</a>
			                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                	<?php
			                		require '../db/db.php';
			                		$categories = $pdo->prepare("SELECT * FROM categories");
			                		$categories->execute();
			                		foreach ($categories as $category) {
			                			echo '<a class="dropdown-item" href="item?cat_id='.$category['cat_id'].'">'.$category['category_name'].'</a>';
			                		}
			                	?>
			                </div>
		             	</li>
		             	<li class="nav-item">
		                	<a class="nav-link" href="event">Events</a>
		             	</li>
		          	</ul>
		          	<form method="POST" action="item" class="form-inline my-2 my-lg-0 border">
						<input class="form-control border-right-0" type="search" name="key" placeholder="Search">
						<button class="form-control border-left-0 p-1 pr-2" type="submit" name="search"><img src="../images/search.png" height="30" width="30"></button>
					</form>
					<a class="btn btn-outline-info ml-2" href="advance_search"> Advance Search </a>
		        </div>
		    </nav>
		</header>

		<main class="main-body-position">
			<?php echo $content; ?>
		</main>

		<span id="gotoTop" class="gotoTop rounded-circle" ><a href="#gotoTop"><img src="../images/arrow.png" height="32px" width="32px"></a></span>
		<footer class="container-fluid bg-light">
			<div class="">
				<div class="row top-footer">
					<div class="col-md-4 pt-2 left-footer ">
					   	<ul class="foot-link list-unstyled text-left">
					    	<li><a class="nav-link pb-0" href="about">About us</a></li>
					    	<li><a class="nav-link pb-0" href="contact">Contact us</a></li>
				   		 	<li><a class="nav-link pb-0" href="#">Privacy Policies</a></li>
				    		<li><a class="nav-link pb-0" href="terms">Terms and Conditions</a></li>
					   	</ul>
					</div>

					<div class="col-md-4 pt-2 mid-footer">
						<address>
							<ul class="list-unstyled">
								<li><i>Auction Drive,</i></li>
								<li><i>Northampton NN1 5PH,</i></li>
								<li><i>England</i></li>
								<li><i>PO. Box: 126783 </i></li>
								<li><i>Fax: 9781811912 </i></li>
							</ul>
						</address>
					</div>

					<div class="col-md-4 pt-2  right-footer">
						<h4>Stay Connected</h4>
						<div class=" pb-2 pl-4">
							<a class="socialMedia" href="https://www.facebook.com" target="_blank"> <img src="../images/facebook.png" alt="facebook"> </a>
							<a class="socialMedia" href="https://twitter.com" target="_blank"><img src="../images/twitter.png" alt="twitter"></a>
							<a class="socialMedia" href="https://www.pinterest.com" target="_blank"><img src="../images/pinterest.png" alt="pinterest"></a>
						</div>
						<div class=" pl-4">
							<a class="socialMedia" href="https://www.youtube.com" target="_blank"><img src="../images/youtube.png" alt="youtube"></a>
							<a class="socialMedia" href="https://www.linkedin.com" target="_blank"><img src="../images/linkedin.png" alt="linkedin"></a>
							<a class="socialMedia" href="https://www.viber.com" target="_blank"><img src="../images/viber.png" alt="viber"></a>
						</div>
					</div>
				</div>

				<div class="pt-2 pb-1 border-top border-secondary">
					<div class="row">
						<div class="col-md-7 pl-4">
							<p> &copy; Fotheby's Auction House, 2019- <?php echo date('Y'); ?> | All Right Reserved </p>
						</div>

						<div class="col-md-5 bottom-foot-link">
							<a class="pr-2 text-muted" href="#">Report a Problem</a>
							<a class="pr-2 text-muted" href="#">FAQ</a>
							<a class="text-muted" href="#">Feedback</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script type="text/javascript">
			$("a[href='#gotoTop']").click(function(){
				$("html, body").animate({scrollTop: 0 }, "slow");
				return false;
			});
		</script>
	</body>
</html>