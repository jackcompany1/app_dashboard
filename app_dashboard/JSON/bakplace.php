<?php
include 'config.php';
  $data=array();
  $data1=array();
$sql="SELECT * FROM `app_category` ";
          $check= mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($check,MYSQLI_ASSOC)) {

   

    
    $cat_id=$row['cat_id'];
    $cat_name=$row['category_name'];
    $cat_image=$row['category_image'];
    
  $sql1="SELECT * FROM app_places where cat_id='".$cat_id."'";
  //var_dump($sql1);
 $check2= mysqli_query($conn, $sql1);
  while($result=mysqli_fetch_array($check2,MYSQLI_ASSOC))
  {


 $json []= $result;
 $json=  array_filter($json,function ($json ){ return (stripos($json['image3'], 'NULL') === false); });
  }
 
 
  
  $json1 []= array("categoryId" => $cat_id,"categoryName"=>$cat_name,"category_image"=>$cat_image,"place"=>$json);
		 unset($json);  
  	
}
 echo json_encode($json1,JSON_UNESCAPED_SLASHES);
 
 

 

 
 
 
 
 
function fill ($var) { 
return (stripos($var['image3'], 'NULL') === false);
 }
 
 
 