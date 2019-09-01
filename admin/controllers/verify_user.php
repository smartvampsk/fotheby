<?php
	$msg = '';
	if (isset($_GET['eid'])) {
		$currentUser = $pdo->query('SELECT * FROM requested_users WHERE req_id = ' . $_GET['eid'])->fetch();
	}

	if (isset($_POST['cancel'])) {
		header('location:applied_form');
	}

	if (isset($_POST['register'])) {
		$reqUserObj = new DatabaseWork($pdo, 'users');
		$data = [
			'user_id' => '',
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'gender' => $_POST['gender'],
			'dob' => $_POST['dob'],
			'contact' => $_POST['contact'],
			'email' => $_POST['email'],
			'status' => $_POST['status'],
			'bank_account' => $_POST['bank_account'],
			'bank_code' => $_POST['bank_code'],
			'username' => $_POST['username'],
			'password' => $_POST['password']
		];
		// print_r($data);
		$reqUserObj->save($data);
		if ($reqUserObj){
			$delrequserObj = new DatabaseWork($pdo, 'requested_users');
			$delId = $_POST['req_id'];
			$delrequserObj->delete('req_id', $delId);
			header('location:view_user');
		}
		else
			header('location:applied_form?msg="Failed to Add User"');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'currentUser'=>$currentUser,
		'msg' => $msg
	];

	
	$title = 'Fotheby\'s Auction Houses - User';
	$content = loadTemplate('../views/verify_user_template.php', $templateVars);
?>