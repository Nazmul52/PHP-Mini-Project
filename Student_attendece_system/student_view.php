
<?php 
include 'inc/header.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/lib/Student.php');
  
   ?>

    <script type="text/javascript">
   	$(document).ready(function(){
   		$("form").submit(function(){
   			var id = true;
   			$(':radio').each(function(){
   			var	name = $(this).attr('name');
   				if(id && !$(':radio[name="' + name + '"]:checked').length){
   					$('.alert').show();
   					id = false;
   				}
   			});
   			return id;
   		});
   	});
   </script>

   <?php
	error_reporting(0);
	 
     $stu = new Student();
	 $dt = $_GET['dt'];


	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$attend    =    $_POST['attend'];
	$att_update = $stu->updateAttence($dt, $attend);
	 }

	
?>


 <?php
	 if(isset($att_update)){
 	echo $att_update;
	}

?> 

<div  class='alert alert-danger' style="display: none;"><strong>Error! </strong> Student Rool Missing !</div>
		<div class="panel panel-default">
			<div class="panel-heading">	
			<h2>
				<a class="btn btn-success" href="add.php">Add Student</a>
				<a class="btn btn-info pull-right" href="date_view.php">Back</a>
			</h2>
			</div>
		</div>

		<div class="panel-body">
			<div class="well text-center" style="font-size: 16px;">
			<strong>Date: </strong><?php  echo $dt; ?>
			</div>
			<form action="" method="post">
			<div class="card">
				<table class="table table-striped">
					<tr>
						<th width="25%">Serial</th>
						<th width="25%">Student Id</th>
						<th width="25%">Student Name</th>
						<th width="25%">Attendence</th>
					</tr>

					<?php

					$get_stu = $stu->getAllData($dt);

					if($get_stu){
						$i = 0;
					
					while ($value = $get_stu->fetch_assoc()) {
						$i++;


					?>
						<tr>
						<td><?php  echo $i; ?></td>
						<td><?php  echo $value['id']; ?></td>
						<td><?php  echo $value['name']; ?></td>
						
						
						<td>
							<input type="radio" name="attend[<?php echo $value['id']; ?>]" value="present" <?php 
									if($value['attend'] == "present") 
									{echo "checked"; }
							 ?> >P
							<input type="radio" name="attend[<?php echo $value['id']; ?>]" value="absent" <?php 
							if($value['attend'] == "absent") {echo "checked"; }
							 ?>>A
						</td>
					</tr>
						<?php
						}
					}
							
						?>
					
					<tr>
						<td>
							<input type="submit" name="submit" class="btn btn-primary" value="Update">
						</td>
					</tr>

				</table>
			</div>
				
			</form>

		</div>



<?php
include 'inc/footer.php';

?>