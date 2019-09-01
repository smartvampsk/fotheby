<?php 
	$msg = '';

	if (isset($_GET['user_id'])) {
		$profileUser = $pdo->query('SELECT * FROM admins WHERE admin_id = ' . $_GET['user_id'])->fetch();
	}
	
	$templateVars = [
		'profileUser'=>$profileUser,
		'msg' => $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Profile';
	$content = loadTemplate('../views/view_profile_template.php', $templateVars);
?>