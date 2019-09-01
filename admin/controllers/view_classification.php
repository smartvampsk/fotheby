<?php 
	$msg = '';

	$classObj = new DatabaseWork($pdo, 'classifications');
	$classifications = $classObj->findAll();

	if (isset($_GET['delId'])) {
		$delClassObj = new DatabaseWork($pdo, 'classifications');
		$delId = $_GET['delId'];
		$delClass = $delClassObj->delete('classif_id', $delId);

		if ($delClass == true) {
			header('location:view_classification?msg=Classification Deleted Successfully');
		}
		else
			header('location:edit_classification?msg=Failed to Delete Classification');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'classifications' => $classifications,
		'msg'=> $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Category';
	$content = loadTemplate('../views/view_classification_template.php', $templateVars);
?>