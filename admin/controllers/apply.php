<?php 
	//$objStory = new DatabaseWork($pdo, 'story');
	//$story = $objStory->findAll();
	//$templateVars = ['story' => $story];
	
	$templateVars = [];
	
	$title = 'Fotheby\'s Auction Houses - Apply';
	$content = loadTemplate('../views/apply_template.php', $templateVars);
?>