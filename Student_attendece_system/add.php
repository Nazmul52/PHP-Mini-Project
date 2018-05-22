<?php 
include 'inc/header.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/lib/Student.php');
?>

<?php

	$stu = new Student();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id    =    $_POST['id'];
		$name  =    $_POST['name'];
		$batch =    $_POST['batch'];

		$insertdata = $stu->insertStudent($id, $name, $batch);
	}


?>

<?php
	if(isset($insertdata)){
		echo $insertdata;
	}

?>
		<div class="panel panel-default">
			<div class="panel-heading">	
			<h2>
				<a class="btn btn-success" href="add.php">Add Student</a>
				<a class="btn btn-info pull-right" href="index.php">Back</a>
			</h2>
			</div>
		</div>

		<div class="panel-body">
			
			<form action="" method="post">
			
				 <div class="form-group">
				 	<label for="name">Student ID</label>
				 	<input class="form-control" type="text" name="id" id="id">

				 	<label for="name">Student Name</label>
				 	<input class="form-control" type="text" name="name" id="name">

				 	<label for="name">Student Batch</label>
				 	<input class="form-control" type="number" name="batch" id="batch">
				 	<br/>
				 	<input type="submit" class="btn btn-primary" name="submit" value="Add Student">
				 </div>
			
				
			</form>

		</div>
<?php
include 'inc/footer.php';

?>