<?php 
	$msg = '';

	$bidObj = new DatabaseWork($pdo, 'bid');
	$bids = $bidObj->findAll();

	if (isset($_GET['delId'])) {
		$delBidObj = new DatabaseWork($pdo, 'bid');
		$delId = $_GET['delId'];
		$delBid = $delBidObj->delete('bid_id', $delId);

		if ($delBid == true) {
			header('location:commission?msg=Bid Deleted Successfully');
		}
		else
			header('location:commission?msg=Failed to Delete Bid');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'bids' => $bids,
		'msg'=> $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Commission';
	$content = loadTemplate('../views/commission_template.php', $templateVars);
?>