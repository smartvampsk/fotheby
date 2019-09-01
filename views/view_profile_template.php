<?php
	if(!isset($_SESSION['logged_user_id'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="mt-3 mb-3 col-md-8">
			<div class="row mt-1">
				<div class="col-md-12 ">
					<h3 class="text-center">My Profile</h3>
				</div>
			</div>

			<div class="border rounded mt-2 p-3">
				<form method="" action="">
					<input type="hidden" class="form-control" name="admin_id" value="<?php echo $profileUser['admin_id']; ?>">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Full Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="firstname" readonly="" value="<?php echo $profileUser['firstname'].' '.$profileUser['lastname']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Gender</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="firstname" readonly="" value="<?php 
								if ($profileUser['gender'] == 'M') { echo 'Male'; }
								else echo "Female"; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Date of Birth</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="dob" readonly="" value="<?php echo $profileUser['dob']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Contact</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="contact" readonly="" value="<?php echo $profileUser['contact']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="email" readonly="" value="<?php echo $profileUser['email']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Status</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="status" readonly="" value="<?php echo $profileUser['status']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Bank Account No.</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="bank_account" readonly="" value="<?php echo $profileUser['bank_account']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Bank Sort Code</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="bank_code" readonly="" value="<?php echo $profileUser['bank_code']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="contact" readonly="" value="<?php echo $profileUser['username']; ?>">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</section>