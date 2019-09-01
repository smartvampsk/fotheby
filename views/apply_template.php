<section class="container pt-1">
	<div class="row">
		<div class="col-md-3">
			
		</div>

		<div class="mt-3 mb-3 col-md-6">
			<legend class="pt-1 pb-1">Wants to be a member of Fotheby's Auction Houses?</legend>
			<p class="text-muted">Fill up the form with correct information to apply.</p>

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
							</button>
						</div>
					<?php
				}
				?>
			</div>

			<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row pt-3">
					<label class="col-sm-4 col-form-label">Given name</label>
					<div class="col-sm-8">
						<input type="text" name="firstname" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Family name</label>
					<div class="col-sm-8">
						<input type="text" name="lastname" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Gender</label>
					<div class="col-sm-8">
						<input type="radio" class="ml-1" name="gender" value="M" checked="">
						<label>Male</label>
						<input type="radio" class="ml-2" name="gender" value="F">
						<label>Female</label>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Date of Birth</label>
					<div class="col-sm-8">
						<input type="date" name="dob" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Contact No.</label>
					<div class="col-sm-8">
						<input type="text" name="contact" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" name="email" class="form-control">
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
						<input type="text" class="form-control" name="bank_account" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Bank Sort Code</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="bank_code" >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username</label>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Confirm Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				
				<div class="form-check mt-4">
					<input type="checkbox" name="accept" class="form-check-input">
					<label class="form-check-label text-muted">I understand and accept the Terms and Conditions </label>
				</div>
				<button type="submit" name="submit" class="btn btn-primary mt-3 mb-3">Apply</button>
				<div class="form-group row pl-3">
					<p class="text-muted">Already a Member? <a class="pl-2" href="login">Login</a></p>
				</div>
			</form>
		</div>
		</div>
	</div>
</section>