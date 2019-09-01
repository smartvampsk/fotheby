<?php 
	$msg = '';

	// $itemsObj = new DatabaseWork($pdo, 'items');
	// $items = $itemsObj->findAll();

	if (isset($_GET['delId'])) {
		$delItemObj = new DatabaseWork($pdo, 'items');
		$delId = $_GET['delId'];
		$delItem = $delItemObj->delete('lot_number', $delId);

		if ($delItem == true) {
			header('location:view_item?msg=Item Deleted Successfully');
		}
		else
			header('location:view_item?msg=Failed to Delete Item');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$itemDetails = $pdo->prepare('SELECT c.*, i.*, cl.*
						FROM categories c
						JOIN items i
						ON i.cat_id = c.cat_id
						JOIN classifications cl
						ON i.classif_id = cl.classif_id
						ORDER BY i.lot_number
						');
	$itemDetails->execute();

	if (isset($_POST['statusWise'])) {
		$status = $_POST['status'];
		if ($status == 'Pending' || $status == 'Sold') {
			$itemDetails = $pdo->prepare('SELECT c.*, i.*, cl.*
						FROM categories c
						JOIN items i
						ON i.cat_id = c.cat_id
						JOIN classifications cl
						ON i.classif_id = cl.classif_id
						WHERE i.status = :status
						ORDER BY i.lot_number
						');
			$data = ['status'=> $status];
			$itemDetails->execute($data);
		}
	}

	$templateVars = [
		'itemDetails' => $itemDetails,
		'msg'=> $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Items';
	$content = loadTemplate('../views/view_item_template.php', $templateVars);
?>