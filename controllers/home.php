<?php 
	$items = $pdo->prepare("SELECT *
		FROM items i
		JOIN categories c
		ON c.cat_id = i.cat_id
		JOIN classifications cl
		ON i.classif_id = cl.classif_id
		JOIN images im 
		ON im.item_id = i.lot_number
		ORDER BY i.lot_number DESC
	");
	$items->execute();

	$events = $pdo->prepare("SELECT *
		FROM items i
		JOIN categories c
		ON c.cat_id = i.cat_id
		JOIN classifications cl
		ON i.classif_id = cl.classif_id
		JOIN images im 
		ON im.item_id = i.lot_number
		JOIN events e 
		ON e.lot_number = i.lot_number
	");
	$events->execute();

	
	$templateVars = [
		'items' => $items,
		'events' => $events
	];
	
	$title = 'Fotheby\'s Auction Houses - Home';
	$content = loadTemplate('../views/home_template.php', $templateVars);
?>