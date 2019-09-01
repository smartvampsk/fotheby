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
				<div class="col-md-8 ">
					<h4>Add Classification</h4>
				</div>
				<div class="col-md-4 text-right">
					<a class="btn btn-outline-info" href="view_classification">View Classification</a>
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
							</button>
						</div>
					<?php
				}
				?>
			</div>
			<div class="border rounded mt-2 p-3">
				<form method="POST" action="">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Classification Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="classification_name" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-6">
							<button type="submit" name="submit" class="btn btn-primary btn-lg mt-3 mb-3">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
