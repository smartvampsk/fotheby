<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row mt-3 mb-3">
		<div class="col-md-4">
			<h4>Commission Bid</h4>
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
						<?php header('Refresh:5; url=commission'); ?>
					</button>
				</div>
			<?php
		}
		?>
	</div>

	<div class="overflow-auto container-fluid">
		<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<th scope="col">S.N</th>
					<th scope="col">Lot Number</th>
					<th scope="col">Item Name</th>
					<th scope="col">Username</th>
					<th scope="col">Estimated Price</th>
					<th scope="col">Minimum Bid</th>
					<th scope="col">Maximum Bid</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					require '../../db/db.php';		
					$bids = $pdo->prepare('SELECT b.*, i.*, u.*
						FROM bid b
						JOIN items i
						ON i.lot_number = b.lot_number
						JOIN users u
						ON u.user_id = b.user_id
						');
					$bids->execute();
					foreach ($bids as $bid) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$bid['lot_number'].'</td>';
						echo '<td>'.$bid['item_name'].'</td>';
						echo '<td>'.$bid['username'].'</td>';
						echo '<td> £'.$bid['price'].'</td>';
						echo '<td> £'.$bid['bid_minimum'].'</td>';
						echo '<td> £'.$bid['bid_maximum'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-info" href="mailto:'. $bid['email'].'">Send Mail</a>
								<a class="btn btn-sm btn-danger" href="commission?delId=' . $bid['bid_id'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</section>