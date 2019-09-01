<?php 
	$itemObj = new DatabaseWork($pdo, 'items');
	$items = $itemObj->findAll();

	if (isset($_GET['eid'])) {
		$currentEvent = $pdo->query('SELECT * FROM events WHERE event_id = ' . $_GET['eid'])->fetch();
	}

	if (isset($_POST['cancel'])) {
		header('location:view_event');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE events SET
			event_name = :event_name,
			lot_number = :lot_number, 
			event_location = :event_location,
			from_date = :from_date,
			to_date = :to_date,
			event_time = :event_time
			WHERE event_id = :event_id
		');

		$data = [
			'event_name' => $_POST['event_name'],
			'lot_number' => $_POST['lot_number'],
			'event_location' => $_POST['event_location'],
			'from_date' => $_POST['from_date'],
			'to_date' => $_POST['to_date'],
			'event_time' => $_POST['event_time'],
			'event_id' => $_POST['event_id']
		];
		$success = $stmt->execute($data);
		if ($success == true){
			header('location:view_event?msg=Event Updated Successfully');
		}
		else
			header('location:edit_event?msg="Failed to Add Event"');
	}


	$templateVars = [
		'items' => $items,
		'currentEvent' => $currentEvent
	];
	
	$title = 'Fotheby\'s Auction Houses - Event';
	$content = loadTemplate('../views/edit_event_template.php', $templateVars);
?>