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
					<h4>Add Category</h4>
				</div>
				<div class="col-md-3 text-right">
					<a class="btn btn-outline-info" href="view_category">View Category</a>
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
								<?php header('Refresh:5; url=view_category'); ?>
							</button>
						</div>
					<?php
				}
				?>
			</div>
			<div class="border rounded mt-2 p-3">
				<form method="POST" action="">
					<input type="hidden" class="form-control" name="cat_id" value="<?php echo $currentCat['cat_id']; ?>">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Category Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="category_name" value="<?php echo $currentCat['category_name']; ?>">
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
