<?php 
	$events = $pdo->prepare("SELECT c.*, i.*, cl.*, e.*, im.*
		FROM categories c
		JOIN items i
		ON i.cat_id = c.cat_id
		JOIN classifications cl
		ON i.classif_id = cl.classif_id
		JOIN events e 
		ON e.lot_number = i.lot_number
		JOIN images im 
		ON e.lot_number = im.item_id
		ORDER BY i.lot_number DESC
		");
	$events->execute();
	$templateVars = ['events' => $events];
	
	$title = 'Fotheby\'s Auction Houses - Items';
	$content = loadTemplate('../views/event_template.php', $templateVars);
?>