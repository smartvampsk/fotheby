<?php
	if (isset($_SESSION['logged_user'])) {
		$loggedUser = $pdo->query('SELECT * FROM admins WHERE admin_id = ' . $_SESSION['logged_user'])->fetch();
	}
	
	$templateVars = ['loggedUser' => $loggedUser];
	
	$title = 'Fotheby\'s Auction Houses - Home';
	$content = loadTemplate('../views/home_template.php', $templateVars);
?>