<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row">
		<!-- <div class="col-md-2"> </div> -->
	
		<div class="mt-3 mb-3 col-md-8">
			<div class="row mt-1">
				<div class="col-md-9 ">
					<h3>Add Users</h3>
				</div>
				<div class="col-md-3 text-right">
					<a class="btn btn-outline-info" href="view_user">View Users</a>
				</div>
			</div>
			<div class="text-left">
				<?php
				if (!empty($msg)) 
				{
					?>
						<div class=" p-2 bg-info alert alert-dismissible fade show">
							<div class="col-md-11">
								<?php echo $msg; ?>
							</div>
							<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><b>&times;</b></span>
								<?php header('Refresh:5; url=view_user'); ?>
							</button>
						</div>
					<?php
				}
				?>
			</div>
			<div>
				<p>Here is the information of applied users. If all the information is right please procced and register them.</p>
			</div>
			<div class="border rounded mt-2 p-3">
				<form method="POST" action="">
					<input type="hidden" class="form-control" name="req_id" value="<?php echo $currentUser['req_id']; ?>">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Firstname</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="firstname" value="<?php echo $currentUser['firstname']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Surname</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="lastname" value="<?php echo $currentUser['surname']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Gender</label>
						<div class="col-sm-8">
							<input type="radio" class="ml-1" value="M" name="gender" checked="">
							<label>Male</label>
							<input type="radio" class="ml-2" value="F" name="gender" <?php if ($currentUser['gender'] == 'F') {
								echo 'checked';
							} ?>>
							<label>Female</label>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Date of Birth</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="dob" value="<?php echo $currentUser['dob']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Contact</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contact" value="<?php echo $currentUser['contact']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="email" value="<?php echo $currentUser['email']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Status</label>
						<div class="col-sm-8">
							<select class="form-control" name="status" required>
								<option value="Buyer">Buyer</option>
								<option value="Seller">Seller</option>
								<option value="Joint">Joint</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Bank Account No.</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="bank_account" value="<?php echo $currentUser['bank_account']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Bank Sort Code</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="bank_code" value="<?php echo $currentUser['bank_code']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="username"  value="<?php echo $currentUser['username']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="password"  value="<?php echo $currentUser['password']; ?>">
						</div>
					</div>

					<div class="form-group d-flex justify-content-between">
						<button type="submit" name="register" class="btn btn-primary btn-lg mt-3 mb-3">Register</button>
						<button type="submit" name="cancel" class="btn btn-danger btn-lg mt-3 mb-3">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
