<?php 
	$msg = '';
	if (isset($_GET['eid'])) {
		$currentAdmin = $pdo->query('SELECT * FROM admins WHERE admin_id = ' . $_GET['eid'])->fetch();
	}

	if (isset($_POST['cancel'])) {
		header('location:view_admin');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE admins SET
			firstname = :firstname,
			lastname = :lastname,
			gender = :gender,
			dob = :dob,
			contact = :contact,
			email = :email,
			role = :role,
			username = :username
			WHERE admin_id = :admin_id
		');
		$data = [
			'admin_id' => $_POST['admin_id'],
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'gender' => $_POST['gender'],
			'dob' => $_POST['dob'],
			'contact' => $_POST['contact'],
			'email' => $_POST['email'],
			'role' => $_POST['role'],
			'username'=>$_POST['username']
		];
		$success = $stmt->execute($data);

		if ($success == true){
			header('location:view_admin?msg=Admin Updated Successfully');
		}
		else
			header('location:edit_admin?msg=Failed to Update Admin Information');
	}
	$templateVars = [
		'currentAdmin'=>$currentAdmin,
		'msg' => $msg
	];

	$title = 'Fotheby\'s Auction Houses - Admin';
	$content = loadTemplate('../views/edit_admin_template.php', $templateVars);
?>