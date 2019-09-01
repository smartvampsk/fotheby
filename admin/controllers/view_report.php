<?php 
	$itemsObj = new DatabaseWork($pdo, 'items');
	$items = $itemsObj->findAll();

	$pendingObj = new DatabaseWork($pdo, 'items');
	$pending = $pendingObj->find('status', 'Pending');

	$soldObj = new DatabaseWork($pdo, 'items');
	$solds = $soldObj->find('status', 'Sold');

	$templateVars = ['items' => $items, 'solds' => $solds, 'pending' => $pending];
	
	$title = 'Fotheby\'s Auction Houses - Report';
	$content = loadTemplate('../views/view_report_template.php', $templateVars);
?>