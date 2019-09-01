<?php 
	$msg = '';
	$itemObj = new DatabaseWork($pdo, 'items');
	$items = $itemObj->findAll();
	
	if (isset($_POST['submit'])) {
		$eventObj = new DatabaseWork($pdo, 'events');
		$data = [
			'event_id' => '',
			'event_name' => $_POST['event_name'],
			'lot_number' => $_POST['lot_number'],
			'event_location' => $_POST['event_location'],
			'from_date' => $_POST['from_date'],
			'event_time' => $_POST['event_time'],
			'to_date' => $_POST['to_date']
		];
		$eventObj->save($data);

		if ($eventObj){
			header('location:view_event');
		}
		else
			header('location:add_event?msg="Failed to Add Event"');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'items' => $items,
		'msg' => $msg
	];
	
	
	$title = 'Fotheby\'s Auction Houses - Event';
	$content = loadTemplate('../views/add_event_template.php', $templateVars);
?>