<html>
<head><title>PDO MySQL</title></head>
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #079B96; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:18px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>PDO MySQL</b></div>
			<div style="margin: 15px">
				
				<!-- <a href="login.php">User Login</a> <br> -->
				<a href="adminLogin.php">Login</a> <br>
				
			</div>
		</div>
	</div>
</body>
</html>