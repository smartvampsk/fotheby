<?php
	$msg = '';
	if (isset($_POST['submit'])) {
		if ($_POST['password'] != $_POST['ConfirmPassword']){
			header('location:add_user?msg=Password not Matched. Try Again');
		}
		else{
			$userObj = new DatabaseWork($pdo, 'users');
			$data = [
				'user_id' => '',
				'firstname' => $_POST['firstname'],
				'lastname' => $_POST['surname'],
				'gender' => $_POST['gender'],
				'dob' => $_POST['dob'],
				'contact' => $_POST['contact'],
				'email' => $_POST['email'],
				'status' => $_POST['status'],
				'bank_account' => $_POST['bank_account'],
				'bank_code' => $_POST['bank_code'],
				'username' => $_POST['username'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
			];
			$userObj->save($data);
			if ($userObj){
				header('location:view_user');
			}
			else
				header('location:add_user?msg="Failed to Add User"');
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];

	
	$title = 'Fotheby\'s Auction Houses - User';
	$content = loadTemplate('../views/add_user_template.php', $templateVars);
?>