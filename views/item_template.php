<section class="container-fluid">
	<div class="container pt-3 pb-3">
		<div class="row col-md-8">
			<?php 
				if (isset($_GET['cat_id'])) {
					require '../db/db.php';
					$cat_id = $_GET['cat_id'];
					$stmt = $pdo->query("SELECT * FROM categories WHERE cat_id = '$cat_id'")->fetch();
						echo '<h2 class="">'.$stmt['category_name'].'</h2>';
				}
				else
					echo '<h2 class="">All Items</h2>';
			?>
		</div>
		
 		<div class="card-deck border-top">
			<?php
			if ($itemDetails->rowCount()>0) {
				foreach ($itemDetails as $item) {
					?>
					<div class="col-md-4">
						<div class="card mt-3 m-0">
							<?php 
								if (file_exists('../images/items/' . $item['image_name'])) {
									echo '<a href="../images/items/'.$item['image_name'].'"><img  class="card-img-top" src="../images/items/' . $item['image_name'].'" /></a>';
								}
							?>
							<div class="card-body">
								<p class="mb-0 text-muted"><b><?php echo 'Item title: '.$item['item_name']; ?></b></p>
								<p class="mb-0 text-muted"><b><?php echo 'Start Price:  &#0163;'.$item['price']; ?></b></p>
								<p class="mb-1 text-muted"><b><?php echo 'Category: '.$item['category_name']; ?></b></p>
								<p class="text-muted" style="height: 50px;"><?php echo substr($item['description'], 0, 50).' ...'; ?></p>
								<p class="text-center"><?php echo '<a class="btn btn-success btn-sm " href="view_detail?vid='.$item['lot_number'].'">Show Detail</a>'; ?> </p>
							</div>
						</div>
					</div>
				<?php
				}
			}
			else{
				echo '<img class="" width="50px" height="50px" style="margin-left:300px; margin-top:40px" src="../images/sad.png">';
				echo '<h5 class="p-5">Sorry! there is no item</h5>'; 
			}
		?>
		</div>
	</div>
</section>