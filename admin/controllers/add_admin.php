<?php
	$msg = '';
	if (isset($_POST['submit'])) {
		if ($_POST['password'] != $_POST['ConfirmPassword']){
			header('location:add_admin?msg=Password not Matched. Try Again');
		}
		else{
			$adminObj = new DatabaseWork($pdo, 'admins');
			$data = [
				'admin_id' => '',
				'firstname' => $_POST['firstname'],
				'lastname' => $_POST['surname'],
				'gender' => $_POST['gender'],
				'dob' => $_POST['dob'],
				'contact' => $_POST['contact'],
				'email' => $_POST['email'],
				'role' => $_POST['role'],
				'username' => $_POST['username'],
				'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
			];
			$adminObj->save($data);

			if ($adminObj){
				header('location:view_admin');
			}
			else
				header('location:add_admin?msg="Failed to Add Admin"');
		}
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Fotheby\'s Auction Houses - Admin';
	$content = loadTemplate('../views/add_admin_template.php', $templateVars);
?>