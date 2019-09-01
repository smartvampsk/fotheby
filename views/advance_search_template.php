<section class="container pt-3 pb-3">
	<div class="row">

		<div class="col-md-11 pt-2">
			<div class="container border rounded pt-3">
				<form method="POST" action="item">
					<legend class="mb-3 text-danger">Advance Search</legend>
					<div class="row pt-2">
						<div class="col-md-4">
							<label>Search for</label>
							<input class="form-control" type="text" name="searching">
						</div>

						<div class="col-md-4">
							<label>Item Category</label>
							<select name="category" class="form-control">
								<option value="">Select...</option>
								<?php 
									foreach ($categories as $cat) {
										echo '<option value="' . $cat['cat_id'] . '">' . $cat['category_name'] . '</option>';
									}
								?>
							</select>
						</div>

						<div class="col-md-4">
							<label>Classifications</label>
							<select name="classification" class="form-control">
								<option value="">Select...</option>
								<?php 
									foreach ($classifications as $classification) {
										echo '<option value="' . $classification['classif_id'] . '">' . $classification['classification_name'] . '</option>';
									}
								?>
							</select>
						</div>
					</div>

					<div class="row pt-4">
						<div class="col-md-4">
							<label>Artist</label>
							<input class="form-control" type="text" name="artist">
						</div>

						<div class="col-md-4">
							<label>Price</label>
							<input class="form-control" type="text" name="price">
						</div>
					</div>

					<div class="form-group pt-2">
						<button type="submit" class="btn btn-primary mt-3 mb-3" name="adSearch">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>