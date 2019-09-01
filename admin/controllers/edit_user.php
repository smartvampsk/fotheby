<?php 
	$msg = '';
	if (isset($_GET['eid'])) {
		$currentUser = $pdo->query('SELECT * FROM users WHERE user_id = ' . $_GET['eid'])->fetch();
	}

	if (isset($_POST['cancel'])) {
		header('location:view_user');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE users SET
			firstname = :firstname,
			lastname = :lastname,
			gender = :gender,
			dob = :dob,
			contact = :contact,
			email = :email,
			bank_account = :bank_account,
			bank_code = :bank_code,
			username = :username
			WHERE user_id = :user_id
		');
		$data = [
			'user_id' => $_POST['user_id'],
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'gender' => $_POST['gender'],
			'dob' => $_POST['dob'],
			'contact' => $_POST['contact'],
			'email' => $_POST['email'],
			'bank_account' => $_POST['bank_account'],
			'bank_code' => $_POST['bank_code'],
			'username'=>$_POST['username']
		];
		$success = $stmt->execute($data);

		if ($success == true){
			header('location:view_user?msg=User\'s Information Updated Successfully');
		}
		else
			header('location:edit_user?msg=Failed to Update User Information');
	}
	$templateVars = [
		'currentUser'=>$currentUser,
		'msg' => $msg
	];

	$title = 'Fotheby\'s Auction Houses - Category';
	$content = loadTemplate('../views/edit_user_template.php', $templateVars);
?>