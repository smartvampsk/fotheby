<?php 
	$msg = '';
	if (isset($_POST['submit'])) {
		$classObj = new DatabaseWork($pdo, 'classifications');
		$data = [
			'classif_id' => '',
			'classification_name' => $_POST['classification_name'],
		];
		$classObj->save($data);

		if ($classObj){
			header('location:view_classification');
		}
		else
			header('location:add_classification?msg="Failed to Add Admin"');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Fotheby\'s Auction Houses - Classification';
	$content = loadTemplate('../views/add_classification_template.php', $templateVars);
?>