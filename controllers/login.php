<?php 
// USERNAME: testing; PASSWORD : testing
// Username: user/user1; Password: testing

	if(isset($_POST['submit'])){
		$loginUser = $pdo->prepare("SELECT * FROM users WHERE username =:username");
		$criteria = ['username'=> $_POST['username']];
		$wrong = false;
		$loginUser -> execute($criteria);
		if($loginUser->rowCount()>0){
			$user = $loginUser->fetch();
			if(password_verify($_POST['password'], $user['password'])){
				$_SESSION['logged_user_id'] = $user['user_id'];
			}
			else {
				$wrong = true;
			}
		}
		else{
			$wrong = true;
		}
		if($wrong == true){
			echo '<script type="text/javascript"> alert("Wrong username or password"); </script>';
		}
	}

	$templateVars = [];
	
	$title = 'Fotheby\'s Auction Houses - Login';
	$content = loadTemplate('../views/login_template.php', $templateVars);
?>