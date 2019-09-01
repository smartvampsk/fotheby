<?php 
	$msg = '';
	if (isset($_GET['eid'])) {
		$currentCat = $pdo->query('SELECT * FROM categories WHERE cat_id = ' . $_GET['eid'])->fetch();
	}
	$templateVars = ['currentCat'=>$currentCat];

	if (isset($_POST['cancel'])) {
		header('location:view_category');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE categories SET
			category_name = :category_name
			WHERE cat_id = :cat_id
		');
		$data = [
			'cat_id' => $_POST['cat_id'],
			'category_name' => $_POST['category_name']
		];
		$success = $stmt->execute($data);

		if ($success == true){
			header('location:view_category?msg=Category Updated Successfully');
		}
		else
			header('location:edit_category?msg=Failed to Add Category');
	}

	$title = 'Fotheby\'s Auction Houses - Category';
	$content = loadTemplate('../views/edit_category_template.php', $templateVars);
?>