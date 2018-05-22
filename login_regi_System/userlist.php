<?php
	require 'config.php';
	if($_SESSION['user_type'] != 'admin')

		header('Location: adminLogin.php');
?>
<?php
$user_type= 'user';
   $sql = "SELECT id, fullname, username, user_type FROM users_details WHERE user_type = '$user_type'";
  
  $result = $connect->query($sql);
  $result->setFetchMode(PDO::FETCH_ASSOC);
  
  
  	# code...
  	// echo "<tr><td>". $row["id"] . "</td><td>". $row["fullname"] ."</td><td>" . $row["username"] . "</td><td>" . $row["user_type"] . "</td></tr>";

 

?>

<!DOCTYPE html>
<html>
    <head>
     <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>All User List</title>

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
    <body  align="center">
      <div style=" border: solid 1px #006D9C; " align="left">
    	<div style="background-color:#006D9C;  color:#FFFFFF; padding:10px;"><b>
       <?php echo $_SESSION['name'] ?></b>
        
				<a href="logout.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none;">Logout</a>
				<a href="dashboard.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none; padding-right: 10px;">Back</a>
        <a href="update.php" style="float: right; color: white; font-size: 18px; font-weight: bold;text-decoration: none; padding-right: 15px;">Update Profile</a>
			</div>
    	
        <div class="container">
        	<div class="row">
            <h1 style="padding-left: 450px; ">User List</h1><br><br>
           
            <table style="margin-top: 20px;"  class="table table-bordered table-condensed">
                <thead>
                    <tr >
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Full Name</th>
                        <th style="text-align: center;">User Name</th>
                        <th style="text-align: center;">User Type</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <?php while ($row = $result->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']) ?></td>
                            <td><?php echo htmlspecialchars($row['fullname']) ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_type']); ?></td>
                            <td><a href="delete.php?id=<?php echo htmlspecialchars($row['id']) ;?>">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            </div>
        </div>
      </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>


</html>
