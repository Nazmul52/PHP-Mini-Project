<?php
	require 'config.php';
	// if(empty($_SESSION['name']))
	// 	header('Location: login.php');

	
	if(isset($_POST['pass'])) {
		$errMsg = '';

		// Getting data from FROM
		$username = $_POST['username'];

		if(empty($username))
			$errMsg = 'Please enter your username  to update your password.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT username FROM users_details WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				
				if($username == $data['username']) {
					$viewpass = 'Your username is correct: ' . $data['username'] . '<br><a href="updatePassword.php?username='.$username.'">Now Update Password</a>';
				}
				else {
					$errMsg = 'User name not matched.';
				}

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
         <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Forgot Password</b>
<a href="index.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none; padding-right: 10px;">Back</a>
			</div>
			<?php

				if(isset($viewpass)){
					echo '<div style="color:#198E35;text-align:center;font-size:17px;margin-top:5px">'.$viewpass.'</div>';
				}
			?>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="username" placeholder="Type Your Username" autocomplete="off" class="box"/><br /><br />
					<input style="padding-left: 20px; padding-right: 20px;" type="submit" name='pass' value="Next" class='btn btn-primary'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>