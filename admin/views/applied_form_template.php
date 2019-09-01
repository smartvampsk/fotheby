<?php
	if(!isset($_SESSION['logged_user'])){
		header('location:login');
	}
?>

<section class="container pt-3">
	<div class="row mt-3 mb-3">
		<div class="col-md-4">
			<h3>Applied Form</h3>
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
					foreach ($reqUsers as $reqUser) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$reqUser['firstname'].' '.$reqUser['surname'].'</td>';
						echo '<td>'.$reqUser['gender'].'</td>';
						echo '<td>'.$reqUser['dob'].'</td>';
						echo '<td>'.$reqUser['contact'].'</td>';
						echo '<td>'.$reqUser['email'].'</td>';
						echo '<td>'.$reqUser['status'].'</td>';
						echo '<td>'.$reqUser['bank_account'].'</td>';
						echo '<td>'.$reqUser['bank_code'].'</td>';
						echo '<td>'.$reqUser['username'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-success" href="verify_user?eid=' . $reqUser['req_id'].'">Verify</a>
								<a class="btn btn-sm btn-danger" href="applied_form?delId=' . $reqUser['req_id'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</ul>
</section>