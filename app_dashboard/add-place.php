<html>
    <head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head>
    <body>

<?php
include'config.php';
if(isset($_POST['addplace']))
    {
 


//////////////////////////////////////////////////
$title=$_POST['placename'];
$remove[] = "'";
$remove[] = '"';
$remove[] = "-"; // just as another example
$title = str_replace( $remove, "", $title );   

$address=$_POST['placeaddress'];
$remove[] = "'";
$remove[] = '"';
$remove[] = "-"; // just as another example
$address = str_replace( $remove, "", $address );   

$facility=$_POST['placefaci'];
$remove[] = "'";
$remove[] = '"';
$remove[] = "="; // just as another example
$facility = str_replace( $remove, "", $facility);   


$phone=$_POST['placephone'];
$website=$_POST['placeweb'];
$lat=$_POST['placelat'];


$description=$_POST['placedes'];
$remove[] = "'";
$remove[] = '"';
$remove[] = "-"; // just as another example

$description = str_replace( $remove, "", $description );   
$long=$_POST['placelong'];
$primaryimage=$_FILES['placeimg']['name'];
$op1=$_FILES['placeimg1']['name'];
$op2=$_FILES['placeimg2']['name'];
$op3=$_FILES['placeimg3']['name'];
$op4=$_FILES['placeimg4']['name'];
$op5=$_FILES['placeimg5']['name'];
$pid=rand(500,10000);
$category= $_POST['chk'];


//var_dump($category);
//exit();
$dat=date("d/m/Y");
////////////////////////////////////////////////////
//
//echo'<pre>';
//var_dump($title);
//var_dump($address);
//var_dump($facility);
//var_dump($description);
//var_dump($phone);
//var_dump($website);
//var_dump($lat);
//var_dump($long);
//var_dump($primaryimage);
//var_dump($op1);
//var_dump($op2);
//var_dump($op3);
//var_dump($op4);
//var_dump($op5);
//var_dump($category);
//var_dump($dat);
//exit();
//

$sql="SELECT * FROM `app_placesmain` ";
         // var_dump($sql);
          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_BOTH);
          //$placename=$resultcheck['title'];
foreach($check as $checkcat){
if($checkcat['title']==$title)
{
$ok=1;
}else{
$ok=0;
}
}

if($ok==1){?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Place Already Exist ",
  text: "Choose a different name",
  icon: "error",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php } else {




 function upload_image($tmp_name,$name){

    
    move_uploaded_file($tmp_name, $name);
}
/////////////////////////////////////////////////////////////////

if(empty($op1) && empty($op2) && empty($op3) && empty($op4) && empty($op5))
{

$new=rand(99,10000);
    $target_dir = "uploads/place/";
$target_file = $target_dir . $new.preg_replace('/\s/', '',basename($_FILES["placeimg"]["name"]));
$target_filepathmain= $serveradd.$target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["placeimg"])) {
    $check = getimagesize($_FILES["placeimg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   ?>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "OOPS ",
  text: "file Not Uploded",
  icon: "error",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script>
        
        <?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["placeimg"]["tmp_name"], $target_file)) {
    $insertplacemain="INSERT INTO app_placesmain (place_id,title,address,facility,description,phone,website,latitude,longitude,image,date) VALUES('".$pid."','".$title."','".$address."','".$facility."','".$description."','".$phone."','".$website."','".$lat."','".$long."','".$target_filepathmain."','".$dat."')";
    //var_dump($insertplacemain);
    //exit();
    $successmain= mysqli_query($conn, $insertplacemain);
    
    
    
    
    foreach($category as $cat_id){
        $insertplace="INSERT INTO app_places (place_id,title,address,facility,description,phone,website,latitude,longitude,image,date,cat_id) VALUES('".$pid."','".$title."','".$address."','".$facility."','".$description."','".$phone."','".$website."','".$lat."','".$long."','".$target_filepathmain."','".$dat."','".$cat_id."')";
//echo'<pre>';var_dump($insertplace);
$success= mysqli_query($conn, $insertplace);
}
?>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Place Added ",
  text: "Successfully",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php
        
        //echo "The file ". basename( $_FILES["catimg"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

} else {
    $target_filepath1="NULL";
    $target_filepath2="NULL";
    $target_filepath3="NULL";
    $target_filepath4="NULL";
    $target_filepath5="NULL";

    if($primaryimage != ''){
$new=rand(99,10000);
		$target_dir = "uploads/place/";
                $tmp_name = $_FILES['placeimg']['tmp_name'];
                $target_file = $target_dir .$new. preg_replace('/\s/', '',basename($_FILES["placeimg"]["name"]));
                $target_filepath= $serveradd.$target_file;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                //var_dump($imageFileType);
		// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. in primary";
    exit();
}
		upload_image($tmp_name,$target_file);
    }
    if($op1 != ''){
$new=rand(99,10000);
		$target_dir = "uploads/place/";
                $tmp_name = $_FILES['placeimg1']['tmp_name'];
                $target_file1 = $target_dir .$new. preg_replace('/\s/', '',basename($_FILES["placeimg1"]["name"]));
                $target_filepath5= $serveradd.$target_file1;
		$imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
		//var_dump($imageFileType);
		// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. in image 1";
exit(); }
		upload_image($tmp_name,$target_file1);
    }
    if($op2 != ''){
$new=rand(99,10000);
		$target_dir = "uploads/place/";
                $tmp_name = $_FILES['placeimg2']['tmp_name'];
                $target_file2 = $target_dir . $new.preg_replace('/\s/', '',basename($_FILES["placeimg2"]["name"]));
                $target_filepath4= $serveradd.$target_file2;
		$imageFileType = pathinfo($target_file2,PATHINFO_EXTENSION);
		//var_dump($imageFileType);
		// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed in image 2.";
exit(); }
		upload_image($tmp_name,$target_file2);
    }
    if($op3 != ''){
$new=rand(99,10000);
		$target_dir = "uploads/place/";
                $tmp_name = $_FILES['placeimg3']['tmp_name'];
                $target_file3 = $target_dir .$new. preg_replace('/\s/', '',basename($_FILES["placeimg3"]["name"]));
                $target_filepath3= $serveradd.$target_file3;
		$imageFileType = pathinfo($target_file3,PATHINFO_EXTENSION);
		//var_dump($imageFileType);
		// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG"  && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed in image 3.";
exit(); }
		upload_image($tmp_name,$target_file3);
    }
    if($op4 != ''){
$new=rand(99,10000);
		$target_dir = "uploads/place/";
                $tmp_name = $_FILES['placeimg4']['tmp_name'];
                $target_file4 = $target_dir .$new.preg_replace('/\s/', '',basename($_FILES["placeimg4"]["name"]));
                $target_filepath2= $serveradd.$target_file4;
		$imageFileType = pathinfo($target_file4,PATHINFO_EXTENSION);
		//var_dump($imageFileType);
		// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
exit(); }
		upload_image($tmp_name,$target_file4);
    }
    if($op5 != ''){
$new=rand(99,10000);
		$target_dir = "uploads/place/";
                $tmp_name = $_FILES['placeimg5']['tmp_name'];
                $target_file5 = $target_dir .$new. preg_replace('/\s/', '',basename($_FILES["placeimg5"]["name"]));
                $target_filepath1= $serveradd.$target_file5;
		$imageFileType = pathinfo($target_file5,PATHINFO_EXTENSION);
		//var_dump($imageFileType);
		// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.in image 5";
exit(); }
		upload_image($tmp_name,$target_file5);
    }
    
    
    
   $insertplacemain="INSERT INTO app_placesmain (place_id,title,address,facility,description,phone,website,latitude,longitude,image,image1,image2,image3,image4,image5,date) VALUES('".$pid."','".$title."','".$address."','".$facility."','".$description."','".$phone."','".$website."','".$lat."','".$long."','".$target_filepath."','".$target_filepath5."','".$target_filepath4."','".$target_filepath3."','".$target_filepath2."','".$target_filepath1."','".$dat."')";

    $successmain= mysqli_query($conn, $insertplacemain);
    
    //var_dump($insertplacemain);

    //exit();
    
    
   foreach($category as $cat_id)
   { 
    
 $insertplace="INSERT INTO app_places (place_id,title,address,facility,description,phone,website,latitude,longitude,image,image1,image2,image3,image4,image5,date,cat_id) VALUES('".$pid."','".$title."','".$address."','".$facility."','".$description."','".$phone."','".$website."','".$lat."','".$long."','".$target_filepath."','".$target_filepath5."','".$target_filepath4."','".$target_filepath3."','".$target_filepath2."','".$target_filepath1."','".$dat."','".$cat_id."')";
$success= mysqli_query($conn, $insertplace);
}
if($success)


{?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Place Added ",
  text: "Successfully",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script>
 <?php }else { echo 'error in query';}
}


    } 
}else {
        header("location:dashboard.php");
            }
            
            
            
            /////////////////////////upload function for optional/////
           