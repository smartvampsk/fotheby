<?php 
	$msg = '';
	if (isset($_GET['vid'])) {
		$lot_number = $_GET['vid'];	
		$itemDetails = $pdo->prepare("SELECT c.*, i.*, cl.*, im.*
			FROM items i
			JOIN categories c
			ON c.cat_id = i.cat_id
			JOIN classifications cl
			ON i.classif_id = cl.classif_id
			JOIN images im 
			ON im.item_id = i.lot_number
			WHERE i.lot_number = '$lot_number'
			");
		$itemDetails->execute();
	}
	if (isset($_SESSION['logged_user_id'])) { 
		$user = $_SESSION['logged_user_id'];
	}
	if (isset($_POST['bid'])) {
		$bidObj = new DatabaseWork($pdo, 'bid');
		$bidUser = $bidObj->find('user_id', $user);
		$data = [
			'bid_id' => '',
			'lot_number' => $_POST['lot_number'],
			'bid_minimum' => $_POST['minimum'],
			'bid_maximum' => $_POST['maximum'],
			'user_id' => $_SESSION['logged_user_id']
		];
		$estmPrice = $_POST['eprice'];
		$bidMin = $_POST['minimum'];
		$bidMax = $_POST['maximum'];
		$error = False;
		$bidUser->execute();
		foreach ($bidUser as $key) {
			if ($key['user_id'] == $user AND $key['lot_number'] == $lot_number) {
				$msg = 'You have already bidded on this item.';
				$error = True;
			}
		}
		if ($error == False) {
			if (($bidMin >= $estmPrice) AND ($bidMax >= $estmPrice)) {
				$bidObj->save($data);

				if ($bidObj){
					$msg = 'Thank You for bidding. You will be notified about the auction! ';
				}
				else
					$msg = "Failed to bid";
			}
			else {
				$msg = "Minimum bid or Maximum bid is less than estimated Price. Please bid more than Estimated Price.";
			}
		}
	}

	$templateVars = [
		'itemDetails' => $itemDetails,
		'msg' => $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Home';
	$content = loadTemplate('../views/view_detail_template.php', $templateVars);
?>