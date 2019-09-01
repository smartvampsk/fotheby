<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">

	<div class="row mt-3 mb-3">
		<div class="col-md-4">
			<h4>View Users</h4>
		</div>

		<div class="col-md-3">
			<a class="btn btn-outline-info" href="add_user">Add User</a>
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
						<?php header('Refresh:5; url=view_user'); ?>
					</button>
				</div>
			<?php
		}
		?>
	</div>

	<div class="overflow-auto">
		<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<th scope="col">S.N</th>
					<th scope="col">Full Name</th>
					<th scope="col">Gender</th>
					<th scope="col">DOB</th>
					<th scope="col">Contact</th>
					<th scope="col">Email</th>
					<th scope="col">Status</th>
					<th scope="col">Bank Account No.</th>
					<th scope="col">Bank Sort Code</th>
					<th scope="col">Username</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					foreach ($users as $user) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$user['firstname'].' '.$user['lastname'].'</td>';
						echo '<td>'.$user['gender'].'</td>';
						echo '<td>'.$user['dob'].'</td>';
						echo '<td>'.$user['contact'].'</td>';
						echo '<td>'.$user['email'].'</td>';
						echo '<td>'.$user['status'].'</td>';
						echo '<td>'.$user['bank_account'].'</td>';
						echo '<td>'.$user['bank_code'].'</td>';
						echo '<td>'.$user['username'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-success" href="edit_user?eid=' . $user['user_id'].'">Edit</a>
								<a class="btn btn-sm btn-danger" href="view_user?delId=' . $user['user_id'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</ul>
</section>