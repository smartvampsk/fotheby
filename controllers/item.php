<?php 
	if (isset($_GET['cat_id'])) {
		$cat_id = $_GET['cat_id'];
		$itemDetails = $pdo->prepare("SELECT c.*, i.*, cl.*, im.*
			FROM categories c
			JOIN items i
			ON i.cat_id = c.cat_id
			JOIN classifications cl
			ON i.classif_id = cl.classif_id
			JOIN images im 
			ON im.item_id = i.lot_number
			WHERE i.cat_id = '$cat_id'
			ORDER BY i.lot_number DESC
			");
		$itemDetails->execute();
		$templateVars = ['itemDetails' => $itemDetails];
	}

	elseif (isset($_POST['search'])) {
		$key = $_POST['key'];
		$itemDetails = $pdo->prepare("SELECT c.*, i.*, cl.*, im.*
			FROM categories c
			JOIN items i
			ON i.cat_id = c.cat_id
			JOIN classifications cl
			ON i.classif_id = cl.classif_id
			JOIN images im
			ON im.item_id = i.lot_number
			WHERE i.item_name LIKE '%$key%' OR i.cat_id LIKE '%$key%' OR i.artist LIKE '%$key%' OR i.produced_year LIKE '%$key%'
			ORDER BY i.lot_number DESC
		");
		$itemDetails->execute();
		$templateVars = ['itemDetails' => $itemDetails] ;
	}

	elseif (isset($_POST['adSearch'])) {
		$searching = $_POST['searching'];
		$category = $_POST['category'];
		$classification = $_POST['classification'];
		$artist = $_POST['artist'];
		$price = $_POST['price'];
		$itemDetails = $pdo->prepare("SELECT c.*, i.*, cl.*, im.*
			FROM categories c
			JOIN items i
			ON i.cat_id = c.cat_id
			JOIN classifications cl
			ON i.classif_id = cl.classif_id
			JOIN images im 
			ON im.item_id = i.lot_number
			WHERE (i.item_name LIKE '%$searching%' OR '$searching' = '')
				AND (i.cat_id LIKE '%$category%' OR '$category' = '' )
				AND (i.classif_id LIKE '%$classification%' OR '$classification' = '') 
				AND (i.artist LIKE '%$artist%' OR '$artist' = '') 
				AND (i.price LIKE '%$price%' OR '$price' = '')
			ORDER BY i.lot_number DESC
		");
		$itemDetails->execute();
		$templateVars = ['itemDetails' => $itemDetails] ;
	}

	else{
		$itemDetails = $pdo->prepare("SELECT c.*, i.*, cl.*, im.*
			FROM categories c
			JOIN items i
			ON i.cat_id = c.cat_id
			JOIN classifications cl
			ON i.classif_id = cl.classif_id
			JOIN images im 
			ON im.item_id = i.lot_number
			ORDER BY i.lot_number DESC
			");
		$itemDetails->execute();
		$templateVars = ['itemDetails' => $itemDetails] ;
	}
	
	$title = 'Fotheby\'s Auction Houses - Items';
	$content = loadTemplate('../views/item_template.php', $templateVars);
?>