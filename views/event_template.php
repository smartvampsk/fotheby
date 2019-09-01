<section class="container-fluid">
	<div class="container pt-3 pb-3">
		<div class="row col-md-8">
			<h2 class="">Events</h2>
		</div>
		
 		<div class="card-deck border-top">
			<?php
				foreach ($events as $event) {
					?>
					<div class="col-md-4"> 
						<div class="card mt-3 m-0">
							<?php 
								if (file_exists('../images/items/' . $event['image_name'])) {
									echo '<a href="../images/items/'.$event['image_name'].'"><img  class="card-img-top" src="../images/items/' . $event['image_name'].'" /></a>';
								}
							?>
							<div class="card-body">
								<p class="mb-0 text-muted"><?php echo '<b>Item title: </b>'.$event['event_name']; ?></p>
								<p class="mb-0 text-muted"><?php echo '<b>Lot Number: </b>'.$event['lot_number']; ?></p>
								<p class="mb-1 text-muted"><?php echo '<b>Venue: </b>'.$event['event_location']; ?></p>
								<p class="mb-1 text-muted"><?php echo '<b>From Date: </b>'.$event['from_date']; ?></p>
								<?php if ($event['to_date'] != '0000-00-00') {
									echo '<p class="mb-1 text-muted"><b>To Date: </b>'.$event['to_date'];'</p>';
								} ?>
								
								<p class="mb-1 text-muted"><?php echo '<b>Starting Time: </b>'.$event['event_time']; ?></p>
							</div>
						</div>
					</div>
				<?php
			} ?>
		</div>
	</div>
</section>