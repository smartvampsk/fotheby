<?php 
	$msg = '';
	if (isset($_POST['submit'])) {
		$userObj = new DatabaseWork($pdo, 'requested_users');
		$data = [
			'req_id' => '',
			'firstname' => $_POST['firstname'],
			'surname' => $_POST['lastname'],
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
		$success = $userObj->save($data);
		if ($userObj){
			header('location:apply?msg=Thanks for applying. Your form will be verified and you will be able to use your account.');
		}
		else
			header('location:apply?msg=Failed to Add User');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Fotheby\'s Auction Houses - Apply';
	$content = loadTemplate('../views/apply_template.php', $templateVars);
?>