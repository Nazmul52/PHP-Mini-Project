<?php
	require 'config.php';
	if($_SESSION['user_type'] != 'admin')

		header('Location: adminLogin.php');
?>

<?php

	$id = $_GET['id'];
    echo $id;
	$sql = "DELETE FROM users_details WHERE id='".$id."'";
  
  $result = $connect->query($sql);
  $result->setFetchMode(PDO::FETCH_ASSOC);
  header('Location: userlist.php');
?>