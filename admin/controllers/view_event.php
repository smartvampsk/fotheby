<?php 
	$msg = '';

	$eventObj = new DatabaseWork($pdo, 'events');
	$events = $eventObj->findAll();

	if (isset($_GET['delId'])) {
		$delEventObj = new DatabaseWork($pdo, 'events');
		$delId = $_GET['delId'];
		$delEvent = $delEventObj->delete('event_id', $delId);

		if ($delEvent == true) {
			header('location:view_event?msg=Event Deleted Successfully');
		}
		else
			header('location:view_event?msg=Failed to Delete Event');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'events' => $events,
		'msg'=> $msg
	];

	$title = 'Fotheby\'s Auction House - Events';
	$content = loadTemplate('../views/view_event_template.php', $templateVars);
?>