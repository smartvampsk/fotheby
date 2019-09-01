<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row mt-5 mb-3">
		<div class="col-md-2"></div>
		<div class="">
			<h2>Welcome to</h2>
			<h2 class="text-danger">Fotheby's Auction Houses Dashbaord</h2>
			<h5>You are logged in as: <b><?php echo $loggedUser['username']; ?></b></h5>
			<h6>Have a good time!</h6>
			<?php echo '<a href="view_profile?user_id='.$_SESSION['logged_user'].'">Go to my Profile</a>'; ?>
			
		</div>
	</div>
</section>