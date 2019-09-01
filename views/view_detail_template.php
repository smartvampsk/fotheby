<section class="container pt-3 pb-3">
		<?php 
			foreach ($itemDetails as $item) { ?>
				<div class="row pt-2">
					<div class="col-md-5">
						<h2 class="text-dark"><?php echo $item['item_name']; ?></h2>
						<div class="container">
							<div class="row text-dark">
								<?php
								if (file_exists('../images/items/' . $item['image_name'])) {
									echo '<a href="../images/items/'.$item['image_name'].'"><img class="card-img-top-detail" src="../images/items/' . $item['image_name'].'" /></a>';
								}
							?>
							</div>

							<div class="row pt-2 ml-3">
								<input type="hidden" name="item_id" value="<?php echo $item['lot_number']; ?>">
								<div class="col-md-12 text-center pl-0">
									<button class="btn btn-outline-warning mt-3 mb-3" 
										<?php 
											if (isset($_SESSION['logged_user_id'])) { 
												echo 'onclick="commissionBids()"'; }
											else echo 'onclick="noPermit()"';
										?>> Commission Bid
									</button>
								</div>
							</div>
						</div>
						<div id="permit" class="text-center text-danger pt-2 row alert alert-dismissible fade show">
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-9 bg-light rounded p-2">
									<h6 class="pb-0">You are not Logged in.</h6>
									<small class="pt-1">You cannot place a bid.</small>
									<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><b>&times;</b></span>
									</button>
								</div>
							</div>
						</div>

						<div class="container-fluid text-center">
						<?php
						if (!empty($msg)) 
						{
							?>
								<div class=" p-2 bg-info alert alert-dismissible fade show">
									<?php echo $msg ?>
									<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><b>&times;</b></span>
									</button>
								</div>
							<?php
						}
						?>
					</div>

						<div class="container-fluid ml-3" id="cBid">
							<form method="POST" class="border p-3 ">
								<div class="pb-3 text-center">
									<small class="text-muted">Wants to buy this item?? <br>Place your bid</small>
								</div>
								<input type="hidden" name="lot_number" value="<?php echo $item['lot_number']; ?>">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Estimated Price:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="esprice" placeholder="<?php echo '£'.$item['price']; ?>" readonly>
										<input type="hidden" class="form-control" name="eprice" value="<?php echo $item['price']; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Your Bid (Minimum)</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="minimum" value="<?php echo $item['price']; ?>" required>
										<small class="text-muted">Change if you want</small>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Your Bid (Maximum)</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="maximum" placeholder="£..." required>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" name="bid" id="bidNow" class="btn btn-primary mt-3 mb-3 pl-4 pr-4">Bid</button>
								</div>
							</form>
						</div>
					</div>

					<div class="col-md-1"></div>
					<div class="col-md-6">
						<h2>Informations</h2>
						<div class="container border">
							<div class="row pt-2 border-bottom">
								<div class="col-md-3 ">
									<p>Lot Number</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['lot_number']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Item Name</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['item_name']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Artist</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['artist']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Category</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['category_name']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Classification</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['classification_name']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Starting Price</p>
								</div>
								<div class="col-md-9 ">
									<?php echo '&#163;'.$item['price']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Produced Year</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['produced_year']; ?>
								</div>
							</div>

							<div class="row pt-2 border-bottom">
								<div class="col-md-3">
									<p>Auction Date</p>
								</div>
								<div class="col-md-9 ">
									<?php echo $item['auction_date']; ?>
								</div>
							</div>

							<?php
							if (!empty($item['medium'])) { ?>
								<div class="row pt-2 border-bottom">
									<div class="col-md-3">
										<p>Dimension</p>
									</div>
									<div class="col-md-9 ">
										<?php echo $item['dimension']; ?>
									</div>
								</div>
							 <?php } 
							 ?>

							<?php
							if (!empty($item['medium'])) { ?>
								<div class="row pt-2 border-bottom">
									<div class="col-md-3">
										<p>Medium</p>
									</div>
									<div class="col-md-9 ">
										<?php echo $item['medium']; ?>
									</div>
								</div>
							 <?php } 
							 ?>

							<?php
							if (!empty($item['frame'])) { ?>
								<div class="row pt-2 border-bottom">
									<div class="col-md-3">
										<p>Frame</p>
									</div>
									<div class="col-md-9 ">
										<?php echo $item['frame']; ?>
									</div>
								</div>
							 <?php } 
							 ?>

							<?php
							if (!empty($item['image_type'])) { ?>
								<div class="row pt-2 border-bottom">
									<div class="col-md-3">
										<p>Image Type</p>
									</div>
									<div class="col-md-9 ">
										<?php echo $item['image_type']; ?>
									</div>
								</div>
							 <?php } 
							 ?>

							<?php
							if (!empty($item['material'])) { ?>
								<div class="row pt-2 border-bottom">
									<div class="col-md-3">
										<p>Material</p>
									</div>
									<div class="col-md-9 ">
										<?php echo $item['material']; ?>
									</div>
								</div>
							 <?php } 
							 ?>
							
							<?php
							if (!empty($item['weight'])) { ?>
								<div class="row pt-2 border-bottom">
									<div class="col-md-3">
										<p>Weight</p>
									</div>
									<div class="col-md-9 ">
										<?php echo $item['weight']; ?>
									</div>
								</div>
							 <?php } 
							 ?>

							<div class="row pt-2">
								<div class="col-md-3 pb-3">
									<p>Description</p>
								</div>
								<div class="col-md-9  pb-3">
									<?php echo $item['description']; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }
		?>
</section>

<script type="text/javascript">
	function noPermit(){
		var permit = document.getElementById("permit");
		if (permit.style.display == "block") {
			permit.style.display = "none";
		} else {
			permit.style.display = "block";
		}
	}

	function commissionBids(){
		var cBid = document.getElementById("cBid");
		if (cBid.style.display == "block") {
			cBid.style.display = "none";
		} else {
			cBid.style.display = "block";
		}
	}
</script>