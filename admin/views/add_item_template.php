<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row">
	
		<div class="mt-3 mb-3 col-md-8">
			<div class="row mt-1">
				<div class="col-md-9 ">
					<h4>Add Item</h4>
				</div>
				<div class="col-md-3 text-right">
					<a class="btn btn-outline-info" href="view_item">View Items</a>
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
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Lot Number</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="lot_number" readonly="">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Item Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="item_name" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Artist</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="artist" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Description</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="description"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Year Produced</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="produced_year" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Classification</label>
						<div class="col-sm-8">
							<select name="classif_id" class="form-control">
								<?php 
									foreach ($classifications as $class) {
										echo '<option value="' . $class['classif_id'] . '">' . $class['classification_name'] . '</option>';
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Auction Date</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="auction_date" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Estimated Price</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="price" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Category</label>
						<div class="col-sm-8">
							<select name="cat_id" class="form-control">
								<?php 
									foreach ($categories as $category) {
										echo '<option value="' . $category['cat_id'] . '">' . $category['category_name'] . '</option>';
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Medium Used</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="medium">
						</div>
					</div>

					<div class="form-group row">
					<label class="col-sm-4 col-form-label">Framed</label>
					<div class="col-sm-8">
						<input type="radio" class="ml-1" name="frame" value="Y">
						<label>Yes</label>
						<input type="radio" class="ml-2" name="frame" value="N">
						<label>No</label>
					</div>
				</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Dimension</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="dimension">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Type of Image</label>
						<div class="col-sm-8">
							<select name="image_type" class="form-control">
								<option selected hidden value="">None</option>
								<option value="coloured">Coloured</option>
								<option value="black & white">Black & White</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Material Used</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="material">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Weight</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="weight">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Upload Images:</label>
						<div class="col-sm-8">
							<input type="file" class="custom-file" name="imageToUpload[]" multiple="multiple" accept="image/*">
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
