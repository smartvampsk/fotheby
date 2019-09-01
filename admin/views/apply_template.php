<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-1">
	<div class="row">
		<div class="col-md-3">
			
		</div>

		<div class="mt-3 mb-3 col-md-6">
			<legend class="pt-1 pb-1">Wants to be a member of Fotheby's Auction Houses?</legend>
			<p class="text-muted">Fill up the form with correct information to apply.</p>
			<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row pt-3">
					<label class="col-sm-4 col-form-label">Given name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Family name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Gender</label>
					<div class="col-sm-8">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" value="M">
							<label class="form-check-label"> Male </label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" value="F">
							<label class="form-check-label"> Female </label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Date of Birth</label>
					<div class="col-sm-8">
						<input type="date" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Contact No.</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Profession</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Property Valuation</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Confirm Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control">
					</div>
				</div>
				
				<div class="form-check mt-4">
					<input type="checkbox" class="form-check-input">
					<label class="form-check-label text-muted">I understand and accept the Terms and Conditions </label>
				</div>
				<button type="submit" class="btn btn-primary mt-3 mb-3">Apply</button>
				<div class="form-group row pl-3">
					<p class="text-muted">Already a Member? <a class="pl-2" href="login">Login</a></p>
				</div>
			</form>
		</div>
		</div>
	</div>
</section>