<html>
    <head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head>
    <body>
<?php 
include 'config.php';

  $id=$_GET['id'];
  $id=base64_decode($id);
  //var_dump($id);

        
           $sql="SELECT * FROM `app_placesmain` where id='".$id."' ";
         //var_dump($sql);

          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_ASSOC);
          //echo'<pre>'; var_dump($resultcheck);
          //exit();
          $imgpath=$resultcheck['image'];
          
          $imgpath=str_replace($serveradd,'',$imgpath);
          
          $op1=$resultcheck['image1'];
          $op2=$resultcheck['image2'];
          $op3=$resultcheck['image3'];
          $op4=$resultcheck['image4'];
          $op5=$resultcheck['image5']; 
////REPLACING STRING OF HTTP AND HPPTS FOR UNLINKING FILE//////////
          $op1=str_replace($serveradd,'',$op1);
          $op2=str_replace($serveradd,'',$op2);
          $op3=str_replace($serveradd,'',$op3);
          $op4=str_replace($serveradd,'',$op4);
          $op5=str_replace($serveradd,'',$op5);         
          $pid=$resultcheck['place_id'];
//var_dump($pid);


          $query="DELETE FROM `app_placesmain` where id='".$id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
          if($result==TRUE)
                                    { 
unlink($imgpath);
if($op1!="NULL"){
unlink($op1);}
if($op2!="NULL"){
unlink($op2); }
if($op3!="NULL"){
unlink($op3);}
if($op4!="NULL"){
unlink($op4);}
if($op5!="NULL"){
unlink($op5);}


$query="DELETE FROM `app_places` where place_id='".$pid."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());


              ?>
               <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Place Deleted Successfully",
  text: "All data  ",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script><?php
          }else
          {?>

              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Place NOt Deleted",
  text: "Fail to Deleted Try again ",
  icon: "error",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "places.php";
//console.log('The Ok Button was clicked.');
});
</script>
         <?php }
          ?>