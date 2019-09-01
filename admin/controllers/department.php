<?php 
	//$objStory = new DatabaseWork($pdo, 'story');
	//$story = $objStory->findAll();
	//$templateVars = ['story' => $story];
	
	$templateVars = [];
	
	$title = 'Fotheby\'s Auction Houses - Departments';
	$content = loadTemplate('../views/department_template.php', $templateVars);
?>