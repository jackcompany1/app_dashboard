<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php';?>
 

 <?php  
$sql="SELECT * FROM `app_placesmain` order by id DESC ";
         
          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_BOTH);
         
 ?>
    <!-- right column -->

        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bell fa-4" aria-hidden="true"></i>Push Notification</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="send.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="title" required >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Message</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Message"  name="msg" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Place</label>
                  
                  <div class="col-sm-10">
<select name="place"  class="selectpicker" data-live-search="true"  style="color: #fff;" title="Choose here..."id="place" required >
<option id="default">--Select Place--</option>
<?php foreach($check as $pageid){?>

     

<option value="<?php echo $pageid['place_id'];?>" id="<?php echo $pageid['place_id'];?>"><?php echo $pageid['title']; ?></option>
  


<?php } ?></select></div></div>
       <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                  
                  <div class="col-sm-10">
                  <script>
                  $(document).ready(function(){
// code to get all records from table via select box
$("#place").change(function() {
var defaultvari='loading.gif'
var id = $(this).find(":selected").val();
var dataString = 'placeid='+ id;
console.log(id);
$.ajax({
url: 'getimg.php',
dataType: "json",
data: dataString,
cache: false,
beforeSend: function(){
        $('#imm').show();
    },
success: function(d){
//alert(d.image); //will alert ok
   $('#imm').attr('src', d.image);
   var imageurl=d.image;
   $.post("send.php",{"imageurl":imageurl});
   //alert(imageurl);
  }
  

});
})
});
                  
                  </script>
                 <img id = "imm" src="select-city-icon.png" height="100" width="100"> 
                 </div>
</div>

<div class="form-group">
                 
   <div class="col-sm-10">
<input type="submit" class="btn btn-primary pull-right" value="Send Notification" name="send">
    </div><div>              
               
             
            </form>

           
       <?php include'scriptfooter.php'; ?>



