<?php
include 'config.php';
 
$sql="SELECT * FROM `app_placesmain` order by id DESC ";
          $check= mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($check,MYSQLI_ASSOC)) {

 
  $json []= $row;
  }
  
  $json1= array("place"=>$json);
		
	  


 
echo json_encode($json1,JSON_UNESCAPED_SLASHES);
 

  
 
 
 
 
 
 
 
 
 
 