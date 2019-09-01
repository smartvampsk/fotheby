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
					<h3>Add Admins</h3>
				</div>
				<div class="col-md-3 text-right">
					<a class="btn btn-outline-info" href="view_admin">View Admin</a>
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
								<?php header('Refresh:5; url=add_admin'); ?>
							</button>
						</div>
					<?php
				}
				?>
			</div>

			<div class="border rounded mt-2 p-3">
				<form method="POST" action="">
					<input type="hidden" class="form-control" name="admin_id" value="<?php echo $currentAdmin['admin_id']; ?>">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Firstname</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="firstname" value="<?php echo $currentAdmin['firstname']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Surname</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="lastname" value="<?php echo $currentAdmin['lastname']; ?>">						
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Gender</label>
						<div class="col-sm-8">
							<input type="radio" class="ml-1" value="M" name="gender" checked="">
							<label>Male</label>
							<input type="radio" class="ml-2" value="F" name="gender" <?php if ($currentAdmin['gender'] == 'F') {
								echo 'checked';
							} ?>>
							<label>Female</label>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Date of Birth</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="dob" value="<?php echo $currentAdmin['dob']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Contact</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="contact" value="<?php echo $currentAdmin['contact']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="email" value="<?php echo $currentAdmin['email']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="username" value="<?php echo $currentAdmin['username']; ?>">
						</div>
					</div>

					<div class="form-group d-flex justify-content-between">
						<button type="submit" name="update" class="btn btn-primary btn-lg mt-3 mb-3">Update</button>
						<button type="submit" name="cancel" class="btn btn-danger btn-lg mt-3 mb-3">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
