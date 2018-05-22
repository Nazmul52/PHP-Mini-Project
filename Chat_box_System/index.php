<?php

include_once "Shout.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>

<?php

	$shout = new Shout();

?>





<!DOCTYPE html>
<html>
<head>
	<title>Basic Shout-Box</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper clr">
	<header class="headersection clr">
		<h2>Basic Shoutbox with PHP OOP and Misqli</h2>
	</header>
		<section class="content clr">
		 <div class="box">
		 	<ul>

		 	<?php

		 		$getData = $shout->getAllData();
		 		if($getData){
		 			while ($data = $getData->fetch_assoc()) {
		 				?>
		 				<li><span><?php echo $data['time'];?></span>- <b><?php echo ucfirst(strtolower($data['name']));?> </b> : <?php echo ucfirst(strtolower($data['body']));?></li>
		 				<?php
		 			}
		 		}

		 	?>
		 		
		 	</ul>

		 	<?php
		 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 		$shoutData = $shout->insertData($_POST);
		 	}


		 	?>
		 </div>
			<div class="shoutform clr">
			 <form action="" method="post">
			 	<table>
			 		<tr>
			 			<td>Name</td>
			 			<td>:</td>
			 			<td><input type="text" name="name" placeholder="Enter your name..." required=""></td>
			 		</tr>

			 		<tr>
			 			<td>Body</td>
			 			<td>:</td>
			 			<td><input type="text" name="body" placeholder="Enter your text..." required=""></td>
			 		</tr>

			 		<tr>
			 			<td></td>
			 			<td></td>
			 			<td><input type="submit" name="submit" value="Shout it" ></td>
			 		</tr>
			 	</table>
			 </form>
				
			</div>
		</section>

		<footer class="footersection clr">
		<h2>&copy Copyright Traning with live project</h2>
			
		</footer>
	</div>


</body>
</html>