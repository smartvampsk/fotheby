<?php 
	$msg = '';
	if (isset($_GET['eid'])) {
		$currentClass = $pdo->query('SELECT * FROM classifications WHERE classif_id = ' . $_GET['eid'])->fetch();
	}
	$templateVars = ['currentClass'=>$currentClass];

	if (isset($_POST['cancel'])) {
		header('location:view_classification');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE classifications SET
			classification_name = :classification_name
			WHERE classif_id = :classif_id
		');
		$data = [
			'classif_id' => $_POST['classif_id'],
			'classification_name' => $_POST['classification_name']
		];
		$success = $stmt->execute($data);

		if ($success == true){
			header('location:view_classification?msg=Classification Updated Successfully');
		}
		else
			header('location:edit_classification?msg=Failed to Add Classification');
	}

	$title = 'Fotheby\'s Auction Houses - Classification';
	$content = loadTemplate('../views/edit_classification_template.php', $templateVars);
?>