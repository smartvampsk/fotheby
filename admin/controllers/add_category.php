<?php 
	$msg = '';
	if (isset($_POST['submit'])) {
		$categoryObj = new DatabaseWork($pdo, 'categories');
		$data = [
			'cat_id' => '',
			'category_name' => $_POST['category_name'],
		];
		$categoryObj->save($data);

		if ($categoryObj){
			header('location:view_category');
		}
		else
			header('location:add_category?msg="Failed to Add Admin"');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = ['msg'=>$msg];
	
	$title = 'Fotheby\'s Auction Houses - Category';
	$content = loadTemplate('../views/add_category_template.php', $templateVars);
?>