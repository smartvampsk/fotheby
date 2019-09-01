<?php
	$msg = '';

	$adminObj = new DatabaseWork($pdo, 'admins');
	$admins = $adminObj->findAll();

	if (isset($_GET['delId'])) {
		$delAdminObj = new DatabaseWork($pdo, 'admins');
		$delId = $_GET['delId'];
		$delAdmin = $delAdminObj->delete('admin_id', $delId);

		if ($delAdmin == true) {
			header('location:view_admin?msg=Admin Deleted Successfully');
		}
		else
			header('location:view_admin?msg=Failed to Delete Admin');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'admins' => $admins,
		'msg'=> $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Admin';
	$content = loadTemplate('../views/view_admin_template.php', $templateVars);
?>