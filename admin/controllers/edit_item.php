<?php 
	$categoryObj = new DatabaseWork($pdo, 'categories');
	$categories = $categoryObj->findAll();

	$classifObj = new DatabaseWork($pdo, 'classifications');
	$classifications = $classifObj->findAll();

	if (isset($_GET['eid'])) {
		$currentItem = $pdo->query('SELECT * FROM items WHERE lot_number = ' . $_GET['eid'])->fetch();
	}

	if (isset($_POST['cancel'])) {
		header('location:view_item');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE items SET
			item_name = :item_name, 
			artist = :artist,
			description = :description,
			produced_year = :produced_year,
			classif_id = :classif_id,
			auction_date = :auction_date,
			price = :price,
			cat_id = :cat_id,
			medium = :medium,
			frame = :frame,
			dimension = :dimension,
			image_type = :image_type,
			material = :material,
			weight = :weight,
			status = :status
			WHERE lot_number = :lot_number
		');

		$data = [
			'lot_number' => $_POST['lot_number'],
			'item_name' => $_POST['item_name'],
			'artist' => $_POST['artist'],
			'description' => $_POST['description'],
			'produced_year' => $_POST['produced_year'],
			'classif_id' => $_POST['classif_id'],
			'auction_date' => $_POST['auction_date'],
			'price' => $_POST['price'],
			'cat_id' => $_POST['cat_id'],
			'medium' => $_POST['medium'],
			'frame' => $_POST['frame'],
			'dimension' => $_POST['dimension'],
			'image_type' => $_POST['image_type'],
			'material' => $_POST['material'],
			'weight' => $_POST['weight'],
			'status' => $_POST['status']
		];
		$success = $stmt->execute($data);
		if ($success == true){
			header('location:view_item?msg=Item Updated Successfully');
		}
		else
			header('location:edit_item?msg="Failed to Add Item"');
	}


	$templateVars = [
		'categories' => $categories,
		'classifications' => $classifications,
		'currentItem' => $currentItem
	];
	
	$title = 'Fotheby\'s Auction Houses - Item';
	$content = loadTemplate('../views/edit_item_template.php', $templateVars);
?>