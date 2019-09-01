<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row mt-3 mb-3">
		<div class="col-md-4">
			<h4>View Items</h4>
		</div>

		<div class="col-md-3">
			<a class="btn btn-outline-info" href="add_item">Add Items</a>
		</div>
		
		<div class="col-md-5 pl-5">
			<form class="form-inline pl-4" method="POST">
				<select class="form-control" name="status">
					<option value="All">All</option>
					<option value="Pending">Pending</option>
					<option value="Sold">Sold</option>
				</select>
				<button class="btn btn-outline-info ml-1" name="statusWise">Search</button>
			</form>
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
						<?php header('Refresh:5; url=view_item'); ?>
					</button>
				</div>
			<?php
		}
		?>
	</div>
	
	<div class="mr-2 table-responsive">
		<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<th>S.N</th>
					<th>Lot Number</th>
					<th>Item Name</th>
					<th>Artist</th>
					<th>Description</th>
					<th>Produced Year</th>
					<th>Classification</th>
					<th>Auction Date</th>
					<th>Price</th>
					<th>Category</th>
					<th>Medium</th>
					<th>Frame</th>
					<th>Dimension</th>
					<th>Image Type</th>
					<th>Material</th>
					<th>Weight</th>
					<th>Status</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					foreach ($itemDetails as $item) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$item['lot_number'].'</td>';
						echo '<td>'.$item['item_name'].'</td>';
						echo '<td>'.$item['artist'].'</td>';
						echo '<td>'.$item['description'].'</td>';
						echo '<td>'.$item['produced_year'].'</td>';
						echo '<td>'.$item['classification_name'].'</td>';
						echo '<td>'.$item['auction_date'].'</td>';
						echo '<td>£'.$item['price'].'</td>';
						echo '<td>'.$item['category_name'].'</td>';
						if (!empty($item['medium'])) {
							echo '<td>'.$item['medium'].'</td>';
						}
						else echo '<td> - </td>';
						if (!empty($item['frame'])) {
							echo '<td>'.$item['frame'].'</td>';
						}
						else echo '<td> - </td>';
						if (!empty($item['dimension'])) {
							echo '<td>'.$item['dimension'].'</td>';
						}
						else echo '<td> - </td>';
						if (!empty($item['image_type'])) {
							echo '<td>'.$item['image_type'].'</td>';
						}
						else echo '<td> - </td>';
						if (!empty($item['material'])) {
							echo '<td>'.$item['material'].'</td>';
						}
						else echo '<td> - </td>';
						if (!empty($item['weight'])) {
							echo '<td>'.$item['weight'].'gm</td>';
						}
						else echo '<td> - </td>';
						echo '<td>'.$item['status'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-success" href="edit_item?eid=' . $item['lot_number'].'">Edit</a>
								<a class="btn btn-sm btn-danger" href="view_item?delId=' . $item['lot_number'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</section>