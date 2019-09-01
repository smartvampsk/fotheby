<?php 
	$msg = '';

	$categoryObj = new DatabaseWork($pdo, 'categories');
	$categories = $categoryObj->findAll();

	if (isset($_GET['delId'])) {
		$delCatObj = new DatabaseWork($pdo, 'categories');
		$delId = $_GET['delId'];
		$delCat = $delCatObj->delete('cat_id', $delId);

		if ($delCat == true) {
			header('location:view_category?msg=Category Deleted Successfully');
		}
		else
			header('location:view_category?msg=Failed to Delete Category');
	}

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$templateVars = [
		'categories' => $categories,
		'msg'=> $msg
	];
	
	$title = 'Fotheby\'s Auction Houses - Category';
	$content = loadTemplate('../views/view_category_template.php', $templateVars);
?>