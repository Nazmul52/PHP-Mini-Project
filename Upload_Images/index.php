<?php include 'inc/header.php';?>
<?php include 'lib/config.php';?>
<?php include 'lib/Database.php';
$db = new Database();
?>


       <div class="myform">
	   <?php
	   if($_SERVER["REQUEST_METHOD"] == "POST"){
		   $permitted = array('jpg', 'png', 'jpeg', 'gif');
		   $file_name = $_FILES['image']['name'];
		   $file_size = $_FILES['image']['size'];
		   $file_tmp = $_FILES['image']['tmp_name'];
		   
		   $div = explode('.', $file_name);
		   $file_ext = strtolower(end($div));
		   $uniqe_image = substr(md5(time()), 0, 10).'.'. $file_ext;
		   $uploaded_images = "uploads/".$uniqe_image;
		   
		  if(empty($file_name)){
			   echo "<span class='error'>Please Select Any Image. </span>";
		  }elseif($file_size>1048567){
			  echo "<span class='error'>Image Size Should be less then 1 mb. </span>";  
		  }elseif(in_array( $file_ext, $permitted)==false){
			  echo "<span class='error'>You can upload only:-".implode(', ', $permitted)."</span>"; 
		  }else{
		   move_uploaded_file($file_tmp, $uploaded_images);
		   $query = "INSERT INTO tbl_image(image) VALUES('$uploaded_images')";
		   $inserted_rows = $db->insert($query);
		   if($inserted_rows){
			   echo "<span class='success'>Image Inserted Successfully. </span>";
		   }else{
			    echo "<span class='error'>Image Not Inserted !</span>";
		   }
		  }
	   }
	   
	   ?>
	   
	   
	      <form action="" method="post" enctype="multipart/form-data">
		     <table>
			   <tr>
			       <td>Select Image</td>
			       <td><input type="file" name="image"/></td>
				</tr>   
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Upload"/></td>
                </tr>
             </table>
           </form>
		   
		   
		   <table width="100%">
		      <tr>
			    <th width="30%">No.</th>
			    <th width="40%">Image</th>
			    <th width="30%">Action</th>
			  
			  </tr>
			 <?php
			 if(isset($_GET['del'])){
				 $id = $_GET['del'];
			 
			  $getquery = "select * from tbl_image where id='$id'";
              $getImg = $db->select($getquery);
              if ($getImg) {
               while ($imgdata = $getImg->fetch_assoc()) {
               $delimg = $imgdata['image'];
              unlink($delimg);
        }
   }
			 
			 
			  $query = "delete from tbl_image where id='$id'";
			  $delImage = $db->delete($query);
			  if($delImage){
			   echo "<span class='success'>Image Deleted Successfully. </span>";
		   }else{
			    echo "<span class='error'>Image Not Deleted !</span>";
		   }
			 } 
			 ?> 
			  
			  
			  <?php
		   
		   $query = "select * from tbl_image";
		   $getImage = $db->select($query);
		   if( $getImage){
			   $i=0;
			   while($result = $getImage->fetch_assoc()){
				   $i++;
			 
		   ?>
		    <tr>
			    <td><?php echo $i; ?></td>
			    <td><img src="<?php echo $result['image'];?>" height="40px" width="50px"/></td>
			   <td><a href="?del =<?php echo $result['id'];?>">Delete</a></td>
			  
			  </tr>
		   
		   <?php }}?>
		   </table>   
		   
		   
		   
		   
        </div>
		
            



<?php include 'inc/footer.php';?>
