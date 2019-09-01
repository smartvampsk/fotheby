<?php 
	
	$templateVars = [];

	$msg = '';

	$userObj = new DatabaseWork($pdo, 'users');
	$users = $userObj->findAll();

	if (isset($_GET['delId'])) {
		$deluserObj = new DatabaseWork($pdo, 'users');
		$delId = $_GET['delId'];
		$delUser = $deluserObj->delete('user_id', $delId);

		if ($delUser == true) {
			header('location:view_user?msg=User Deleted Successfully');
		}
		else
			header('location:view_user?msg=Failed to Delete User');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'users' => $users,
		'msg'=> $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Users';
	$content = loadTemplate('../views/view_users_template.php', $templateVars);
?>