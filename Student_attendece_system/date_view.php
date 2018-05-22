
<?php 
include 'inc/header.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/lib/Student.php');
  
   
    ?>
	

		<div class="panel panel-default">
			<div class="panel-heading">	
			<h2>
				<a class="btn btn-success" href="add.php">Add Student</a>
				<a class="btn btn-info pull-right" href="index.php">Take Attendence</a>
			</h2>
			</div>
		</div>

		<div class="panel-body">
			
			<form action="" method="post">
			<div class="card">
				<table class="table table-striped">
					<tr>
						<th width="30%">Serial</th>
						
						<th width="50%">Attendence Date</th>
						<th width="20%">Action</th>
						
					</tr>
					<?php
					$stu = new Student();

					$get_data = $stu->getDateList();
					if($get_data){
						$i = 0;
					
					while ($value = $get_data->fetch_assoc()) {
						$i++;


					?>
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $value['att_time']; ?></td>
						
						
						<td>
							<a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time'];?>">View</a>
						</td>
					</tr>
						<?php
						}
							}
						?>
					
					

				</table>
			</div>
				
			</form>

		</div>



<?php
include 'inc/footer.php';

?>