<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';

		// Getting data from FROM
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$password = password_hash($password, PASSWORD_DEFAULT);
		// $passwordVarify = $_POST['passwordVarify'];
  //       $passwordVarify = password_hash($passwordVarify, PASSWORD_DEFAULT);
		// if($password != $passwordVarify)
		// 	$errMsg = 'Password not matched.';

		if($errMsg == '') {
			try {
		      $sql = "UPDATE users_details SET fullname = :fullname, password = :password, secretpin = :secretpin WHERE username = :username";
		      $stmt = $connect->prepare($sql);                                  
		      $stmt->execute(array(
		        ':fullname' => $fullname,
		        ':secretpin' => $secretpin,
		        ':password' => $password,
		        ':username' => $_SESSION['username']
		      ));
				header('Location: update.php?action=updated');
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
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b><?php echo $_SESSION['name'] ?></b>
				<a href="logout.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none;">Logout</a>
				<a href="dashboard.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none; padding-right: 10px;">Back</a>
				<?php
				  if($_SESSION['user_type']== 'admin'){
                	
                	?>
				<a href="userlist.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none; padding-right: 10px; ">User List</a>
<?php
                }
                ?>
			</div>
			<div style="margin: 15px">
				<form action="" method="post">
					Full Name <br>
					<input type="text" name="fullname" value="<?php echo $_SESSION['name']; ?>" autocomplete="off" class="box"/><br />
					User Name <br>
					<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" disabled autocomplete="off" class="box"/><br />
					Secret Pin <br>
					<input type="text" name="secretpin" value="<?php echo $_SESSION['secretpin']; ?>" autocomplete="off" class="box"/><br />
					<!-- <hr>
					Password <br>
					<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/> --><br/>
					<!-- Vafify Password <br>
					<input type="password" name="passwordVarify" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br /> -->
					<input type="submit" name='update' value="Update" class='btn btn-primary'/><br />
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>
