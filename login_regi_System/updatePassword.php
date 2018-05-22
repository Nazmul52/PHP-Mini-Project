<?php
	require 'config.php';
	// if(empty($_SESSION['name']))
	// 	header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';


		// Getting data from FROM
		$username = $_GET['username'];
		$password = $_POST['password'];

		if(empty($password))
			$errMsg = 'Please enter your password .';

		$password = password_hash($password, PASSWORD_DEFAULT);
		// $passwordVarify = $_POST['passwordVarify'];
  //       $passwordVarify = password_hash($passwordVarify, PASSWORD_DEFAULT);
		// if($password != $passwordVarify)
		// 	$errMsg = 'Password not matched.';

		if($errMsg == '') {
			try {
		      $sql = "UPDATE users_details SET  password = :password WHERE username='".$username."'";
		      $stmt = $connect->prepare($sql);                                  
		      $stmt->execute(array(
		       
		        ':password' => $password
		       
		      ));
				header('Location: adminLogin.php');
				exit;

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'updated')
		$errMsg = 'Successfully updated. <a href="logout.php">Logout</a> and login to see update.';
?>



<html>
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Own Profile</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

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
			
			<div style="margin: 15px">
				<form action="" method="post">
					
					Password <br>
					<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br/>
					
					<input type="submit" name='update' value="Update" class='btn btn-primary'/><br />
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>
