<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row mt-3 mb-3">
		<div class="col-md-4">
			<h4>View Category</h4>
		</div>

		<div class="col-md-3 ">
			<a class="btn btn-outline-info" href="add_category">Add Category</a>
		</div>
		
		<div class="col-md-5 pl-5">
			<form class="form-inline pl-4">
				<input class="form-control" type="search" placeholder="Search">
				<button class="btn btn-outline-info ml-1">Search</button>
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
						<?php header('Refresh:5; url=view_category'); ?>
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
					<th scope="col">Category Name</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					foreach ($categories as $category) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$category['category_name'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-success" href="edit_category?eid=' . $category['cat_id'].'">Edit</a>
								<a class="btn btn-sm btn-danger" href="view_category?delId=' . $category['cat_id'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</section>