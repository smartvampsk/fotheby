<?php 
	$reqUserObj = new DatabaseWork($pdo, 'requested_users');
	$reqUsers = $reqUserObj->findAll();
	$templateVars = ['reqUsers' => $reqUsers];
	
	$title = 'Fotheby\'s Auction Houses - Users';
	$content = loadTemplate('../views/applied_form_template.php', $templateVars);
?>