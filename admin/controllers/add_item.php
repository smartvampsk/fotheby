<?php 
	$categoryObj = new DatabaseWork($pdo, 'categories');
	$categories = $categoryObj->findAll();

	$classifObj = new DatabaseWork($pdo, 'classifications');
	$classifications = $classifObj->findAll();


	if (isset($_POST['submit'])) {
	$itemObj = new DatabaseWork($pdo, 'items');
		$data = [
			'lot_number' => '',
			'item_name' => $_POST['item_name'],
			'artist' => $_POST['artist'],
			'description' => $_POST['description'],
			'produced_year' => $_POST['produced_year'],
			'classif_id' => $_POST['classif_id'],
			'auction_date' => $_POST['auction_date'],
			'price' => $_POST['price'],
			'cat_id' => $_POST['cat_id'],
			'medium' => $_POST['medium'],
			'frame' => $_POST['frame'],
			'dimension' => $_POST['dimension'],
			'image_type' => $_POST['image_type'],
			'material' => $_POST['material'],
			'weight' => $_POST['weight'],
			'status' => 'Pending'
		];
		$itemObj->save($data);

		$faults = array();
		$uploadingFile = array();
		$extension = array("jpeg","jpg","png", "PNG","gif");
		$bytes = 1024;
		$KB = 1024;
		$totalBytes = $bytes * $KB;
		$targetDir = "../../images/items";
		$counter = 0;
		

		foreach($_FILES["imageToUpload"]["tmp_name"] as $key=>$tmp_name){
		    $temp = $_FILES["imageToUpload"]["tmp_name"][$key];
		    $name = $_FILES["imageToUpload"]["name"][$key];
		     
		    if(empty($temp)){
		        break;
		    }
		    
		    $counter++;
		    $UploadOk = true;
		     
		    if($_FILES["imageToUpload"]["size"][$key] > $totalBytes){
		    	$UploadOk = false;
		        array_push($faults, $name." file size is larger than the 1 MB.");
		    }
		    
		   	$ext = pathinfo($name, PATHINFO_EXTENSION);
		    if(in_array($ext, $extension) == false){
		        $UploadOk = false;
		        array_push($faults, $name." is invalid file type.");
		    }
		     
		    if(file_exists($targetDir."/".$name) == true){
		        $UploadOk = false;
		        array_push($faults, $name." file is already exist.");
		    }
		    
		   if($UploadOk == true){
		        move_uploaded_file($temp,$targetDir."/".$name);
		        array_push($uploadingFile, $name);
		    }
		}
		if($counter>0){
		    if(count($faults)>0)
		    {
		        foreach($faults as $error)
		        {
		            ?><script type="text/javascript">
		            	alert("Error: <?php echo $error; ?>");
		            </script><?php
		        }
		    }

		  	if(count($uploadingFile)>0){
		        $photoName = $pdo->lastInsertId();
		        foreach($uploadingFile as $fileName)
		        {
		        	$savePhoto = $pdo->prepare("INSERT INTO images(item_id, image_name)
		        		VALUES('$photoName', '$fileName')");
		        	$savePhoto->execute();
		        }
		        echo "</ul><br/>";
		    }
		    unset($_POST);                               
		}
		else{
		    echo "Please, Select files to upload.";
		}

		if ($itemObj){
			header('location:view_item');
		}
		else
			header('location:add_item?msg="Failed to Add Item"');
	}


	$templateVars = [
		'categories' => $categories,
		'classifications' => $classifications
	];
	
	$title = 'Fotheby\'s Auction Houses - Items';
	$content = loadTemplate('../views/add_item_template.php', $templateVars);
?>