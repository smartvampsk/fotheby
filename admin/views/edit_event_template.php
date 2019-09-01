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
					<h4>Add Events</h4>
				</div>
				<div class="col-md-3 text-right">
					<a class="btn btn-outline-info" href="view_event">View Events</a>
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
								<?php header('Refresh:5; url=view_event'); ?>
							</button>
						</div>
					<?php
				}
				?>
			</div>
			<div class="border rounded mt-2 p-3">
				<form method="POST" action="">
					<input type="hidden" class="form-control" name="event_id" value="<?php echo $currentEvent['event_id']; ?>">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Event Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="event_name" value="<?php echo $currentEvent['event_name']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Item Name</label>
						<div class="col-sm-8">
							<select name="lot_number" class="form-control">
								<?php
								foreach ($items as $item) {
									if ($item['lot_number'] == $currentEvent['lot_number']) {
										echo '<option selected="selected" value="' . $item['lot_number'] . '">' . $item['item_name'] . '</option>';
									}
									else {
										echo '<option value="' . $item['lot_number'] . '">' . $item['item_name'] . '</option>';
									}
								}
							?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Location</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="event_location"><?php echo $currentEvent['event_location']; ?></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">From Date</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="from_date" required value="<?php echo $currentEvent['from_date']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Time</label>
						<div class="col-sm-8">
							<input type="time" class="form-control" name="event_time" required value="<?php echo $currentEvent['event_time']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">To Date</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" name="to_date" value="<?php echo $currentEvent['to_date']; ?>">
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
