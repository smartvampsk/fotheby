<?php 
	$categoryObj = new DatabaseWork($pdo, 'categories');
	$categories = $categoryObj->findAll();

	$itemObj = new DatabaseWork($pdo, 'items');
	$items = $itemObj->findAll();

	$classifObj = new DatabaseWork($pdo, 'classifications');
	$classifications = $classifObj->findAll();

	$templateVars = [
		'categories' => $categories,
		'items' => $items,
		'classifications' => $classifications
	];
	$title = 'Fotheby\'s Auction House - Advance Search';
	$content = loadTemplate('../views/advance_search_template.php', $templateVars);
?>