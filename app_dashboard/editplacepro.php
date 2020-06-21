<?php          
 include 'config.php';
 include 'header.php';
 if(isset($_POST['addplace']))
    {
   //unset($_SESSION['place_id']); 
$id=$_SESSION['place_id'];
//////////////////////////////////////////////////
$title=$_POST['placename'];
$address=$_POST['placeaddress'];
$facility=$_POST['placefaci'];
$description=$_POST['placedes'];
$phone=$_POST['placephone'];
$website=$_POST['placeweb'];
$lat=$_POST['placelat'];
$long=$_POST['placelong'];

$category= $_POST['chk'];


//var_dump($category);
//exit();
$dat=date("d/m/Y");
 
 //echo'<pre>';
//var_dump($title);
//var_dump($address);
//var_dump($facility);
//var_dump($description);
//var_dump($phone);
//var_dump($website);
//var_dump($lat);
//var_dump($long);
//var_dump($category);
//var_dump($dat);
//exit();
 $checkdetails="SELECT * FROM app_placesmain Where place_id='".$id."'";
 $successcheck= mysqli_query($conn, $checkdetails); 
 $successresult=mysqli_fetch_array($successcheck,MYSQLI_ASSOC);
  //var_dump($successresult);
  $image=$successresult['image'];
  $image1=$successresult['image1'];
  $image2=$successresult['image2'];
$image3=$successresult['image3'];
$image4=$successresult['image4'];
$image5=$successresult['image5'];


//////////////////////////UPDATEING DEATILS ////////////////////////////

 $insertplacemain="UPDATE app_placesmain SET title='".$title."',address='".$address."',facility='".$facility."',description='".$description."',phone='".$phone."',website='".$website."',latitude='".$lat."',longitude='".$long."',date= '".$dat."' WHERE place_id='".$id."'"; 
    $successmain= mysqli_query($conn, $insertplacemain); 

$query="DELETE FROM `app_places` where place_id='".$id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
    

foreach($category as $cat_id){

     $insertplace="INSERT INTO app_places (place_id,title,address,facility,description,phone,website,latitude,longitude,image,image1,image2,image3,image4,image5,date,cat_id) VALUES('".$id."','".$title."','".$address."','".$facility."','".$description."','".$phone."','".$website."','".$lat."','".$long."','".$image."','".$image1."','".$image2."','".$image3."','".$image4."','".$image5."','".$dat."','".$cat_id."')";
//echo'<pre>';var_dump($insertplace);


$success= mysqli_query($conn, $insertplace);
   

 
    
    }
    ?>
       
<?php if($success) {  ?>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Place Updated ",
  text: "Successfully",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script>



        
    <?php }?>
    
    
    
    
    
 <?php   
}?>

