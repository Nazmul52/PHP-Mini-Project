
<?php 
 	   $filepath = realpath(dirname(__FILE__));
       include_once ($filepath.'/Database.php');
   
    ?>

<?php


/**
* 
*/
Class Student
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function getStudents(){
		$query = "SELECT * FROM tbl_students";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertStudent($id, $name, $batch){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$name = mysqli_real_escape_string($this->db->link, $name);
		
		$batch = mysqli_real_escape_string($this->db->link, $batch);

		if(empty($name) || empty($id) || empty($batch)){
			$msg = "<div class='alert alert-danger'><strong>Error! </strong> Field must not be empty !</div>";
			return $msg;
		}else{
			$stu_query = "INSERT INTO tbl_students(id, name, batch) VALUES('$id', '$name', '$batch')";
			$stu_insert = $this->db->insert($stu_query);

			$att_query = "INSERT INTO tbl_attendence(id) VALUES('$id')";
			$stu_insert = $this->db->insert($att_query);

			if($stu_insert) {
				$msg = "<div class='alert alert-success'><strong>Success! </strong>Student Inserted Successfully .</div>";
			return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong> Student data not inserted !</div>";
			return $msg;
			}
		}
	}

	public function insertAttence($cur_date, $attend = array()){
      $query = "SELECT DISTINCT att_time FROM tbl_attendence";	

      $getdata = $this->db->select($query);

      while ($result = $getdata->fetch_assoc()) {
      		$db_date = $result['att_time'];

      		if($cur_date == $db_date){
      			$msg = "<div class='alert alert-danger'><strong>Error! </strong> Today Attendence Already Taken !</div>";
			return $msg;
      		}
      	}	

      	foreach ($attend as $atn_key  => $atn_value) {
      		if($atn_value == "present"){
      			$stu_query = "INSERT INTO tbl_attendence(id, attend, att_time) VALUES('$atn_key', 'present',  now())";
      			$data_insert = $this->db->insert($stu_query);

      		}elseif($atn_value == "absent"){
      			$stu_query = "INSERT INTO tbl_attendence(id, attend, att_time) VALUES('$atn_key', 'absent',  now())";
      			$data_insert = $this->db->insert($stu_query);
      		}
      	}

      	if($data_insert){
      	$msg = "<div class='alert alert-success'><strong>Success! </strong> Attendence Data Insert Successfully !</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error! </strong> Attendence Data not Inserted !</div>";
			return $msg;
		}
	}


	public function getDateList(){
		 $query = "SELECT DISTINCT att_time FROM tbl_attendence";
		  $result = $this->db->select($query);	

		  return $result;
	}

	public function getAllData($dt){
		$query = "SELECT tbl_students.name, tbl_attendence.* FROM tbl_students INNER JOIN tbl_attendence ON tbl_students.id = tbl_attendence.id WHERE att_time = '$dt'";
		  $result = $this->db->select($query);	

		  return $result;
	}


	public function updateAttence($dt, $attend){

      

      	foreach ($attend as $atn_key  => $atn_value) {
      		if($atn_value == "present"){
      			$query = "UPDATE tbl_attendence SET attend = 'present' WHERE id  = '".$atn_key."'
      			AND att_time = '".$dt."'
      					 ";

      					 $data_update = $this->db->update($query);	
      		}elseif($atn_value == "absent"){
      			$query = "UPDATE tbl_attendence SET attend = 'absent' WHERE id  = '".$atn_key."'
      			AND att_time = '".$dt."'
      					 ";

      					 $data_update = $this->db->update($query);	
      		}
      	}

      	if($data_update){
      	$msg = "<div class='alert alert-success'><strong>Success! </strong> Attendence Data Updated Successfully !</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error! </strong> Attendence Data not Updated !</div>";
			return $msg;
		}
	}
}


  
 	 
?>