<?php 
	$itemObj = new DatabaseWork($pdo, 'items');
	$items = $itemObj->findAll();
	$templateVars = ['items' => $items] ;

	$title = 'Fotheby\'s Auction House - Auction';
	$content = loadTemplate('../views/auction_template.php', $templateVars);
?>