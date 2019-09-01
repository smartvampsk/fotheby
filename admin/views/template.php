<!DOCTYPE html>
<html>
	<head>
		<title> <?php echo $title; ?> </title>
		<link rel="stylesheet" href="../../css/style.css"/>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/header.js"></script>
	</head>
	<body>		
		<section class="row">
			<aside class="col-md-3 pl-4 admin-sidebar bg-light">
				<a class="navbar-brand" href="home">
				<img src="../../images/logo.jpg" width="250" class="d-inline-block align-top ml-0 pt-2" alt="Fotheby's Auction House Logo">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php require 'sidebar.php'; ?>
			</aside>
			<main class="col-md-9 pr-0">
				<header>
				    <div class=" p-3 bg-light">
						<div class="text-right pr-4 mr-1">
							<div class="dropdown">
								<?php 
									require '../../db/db.php'; 
									if (isset($_SESSION['logged_user'])) {
										$logged_id = $_SESSION['logged_user'];
										$stmt = $pdo->prepare("SELECT * FROM admins WHERE admin_id = '$logged_id'");
										$stmt->execute();
										foreach ($stmt as $key) {
											echo 'Hello, '.$key['username'];
										}
									}
								?>
								<a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="../../images/user1.png" height="30" width="30" class="rounded-circle">
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<?php 
										if (isset($_SESSION['logged_user'])) {
											echo '<a class="dropdown-item" href="view_profile?user_id='.$_SESSION['logged_user'].'">Profile</a>';
											echo '<a class="dropdown-item" href="logout">Logout</a>';
										}
										else{
											echo '<a class="dropdown-item" href="login">Login</a>';
										}
									?>
									
								</div>
							</div>
						</div>
					</div>
				</header>
				<main class="">
					<?php echo $content; ?>
				</main>
			</main>
		</section>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>

