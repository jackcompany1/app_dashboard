<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
 
  <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-17 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
            <li class="pull-left header"><i class="fa fa-map-marker fa-2" aria-hidden="true"></i>Places</li>
           
            </ul>
          </div>
            
             <button class="btn btn-primary " class="pull-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-6" aria-hidden="true"></i> Add Place</button>
             <hr>
                 <br>
            <!--<h1>hello</h1>-->
            <?php
           $sql="SELECT * FROM `app_placesmain` ";
         // var_dump($sql);
          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_BOTH);
          //var_dump($resultcheck);

 
 ?><script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function() 
		{} 	        
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("getresultplace.php");
	}
}
</script>

         
            
                
               
             
            <div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div>
<div class="page-content">
	<div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
	Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
	<option value="all-links">Display All Page Link</option>
	<option value="prev-next">Display Prev Next Only</option>
	</select>
	</div>
	
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>
<script>
getresult("getresultplace.php");
</script>


            </div>
            <!-- /.box-body -->
          </div>
          </section>
      </div></section>
</div>

      
      
       <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Place</h4>
      </div>
      <div class="modal-body">
        
          <form role="form" action="add-place.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place Name" name="placename" required="required">
                </div>
                  <label for="exampleInputEmail1">Address</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" name="placeaddress" required="required">  
                  </div>
                  <label for="exampleInputEmail1">Facility</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Facility" name="placefaci" required="required">  
                  </div>
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" rows="5" id="comment" placeholder="Enter Description" name="placedes"></textarea>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Phone No</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place Phone No" name="placephone" required="required">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Website</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place Website" name="placeweb" required="required">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Latitude</label>
                  <input type="text" class="form-control" id="txtlat" placeholder="Enter Place Latitude" name="placelat" required="required" oninput="ValidateLat()"  onkeypress="return isFloatNumber(this,event)">
                </div>
                  
                   <div class="form-group">
                  <label for="exampleInputEmail1">Longitude</label>
                  <input type="text" class="form-control" id="txtlon" placeholder="Enter Place Longitude" name="placelong" required="required" oninput="ValidateLon()"  onkeypress="return isFloatNumber(this,event)">
                  <p style="float: right"><a target="_blank" href="http://www.mapcoordinates.net/en">COORDINATE PICKER</a></p>
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputFile">Primary Image</label>
                  <input type="file" id="exampleInputFile" name="placeimg" required>
                  </div>
                  
                   
                  <div class="form-group">
                  <label for="exampleInputFile">Optional Image</label>
                  <br>
                  <input type="file" id="optional_id" name="placeimg1" > 
                  <br>
                  <input type="file" id="optional_id1" name="placeimg2"  disabled >
                  
                  <br>
                     <input type="file" id="optional_id2" name="placeimg3" disabled >
                  <br>
                  <input type="file" id="optional_id3" name="placeimg4" disabled > 
                  <br>
                  <input type="file" id="optional_id4" name="placeimg5" disabled>
                  </div>
                  <p class="help-block">Please upload gif,jpg,jpeg,bmp,png files only.</p>
                  <div class="form-group text-muted well well-sm no-shadow">
 			 <p class="help-block">Please check atleast one Category.</p>                     
                      <lable><b>Categories</b></lable><br>
                      
                      <?php $sql1="SELECT * FROM `app_category` ";
         // var_dump($sql);
          $check1= mysqli_query($conn, $sql1);
          $resultcheck1= mysqli_fetch_array($check1,MYSQLI_BOTH);
                      
                      foreach($check1 as $row){?>
                      
                       <div class="checkbox-inline">
                           <span style="margin-left:10px"></span><input name="chk[]" value="<?php echo $row['cat_id'];?>" type="checkbox" id="mycheckbox"><span><?php echo $row['category_name'];?> </span><span style="margin-left:10px"></span>
                      </div>
                      
                      <?php } ?>
                       <br>
                              
                  </div>
              </div>
              <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Place" name="addplace" id="postme" disabled title='Fill all the deatails completely'>
      </form>
</div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

var checkboxes = $("input[type='checkbox']"),
submitButt = $("input[type='submit']");

checkboxes.click(function() {
submitButt.attr("disabled", !checkboxes.is(":checked"));
});

</script>           
        
 <script>$("#optional_id").on("change", function () {
    $("#optional_id1").prop("disabled", !this.value);
})
.trigger('change');


$("#optional_id1").on("change", function () {
    $("#optional_id2").prop("disabled", !this.value);
})
.trigger('change');


$("#optional_id2").on("change", function () {
    $("#optional_id3").prop("disabled", !this.value);
})
.trigger('change');

$("#optional_id3").on("change", function () {
    $("#optional_id4").prop("disabled", !this.value);
})
.trigger('change');

$("#optional_id4").on("change", function () {
    $("#optional_id4").prop("disabled", !this.value);
})
.trigger('change');



        function ValidateLat() {
            var lat = document.getElementById("txtlat").value;
            

            if (lat < -90 || lat > 90) {
                alert("Latitude must be between -90 and 90 degrees inclusive.");
                return;
            }
             
            
            else if (lat == "") {
                alert("Enter a valid Latitude or Longitude!");
                return;
            }
        }

function ValidateLon() {
           var lng = document.getElementById("txtlon").value;
            

            if (lng < -180 || lng > 180) {
                alert("Longitude must be between -180 and 180 degrees inclusive.");
                return;
                }
            else if (lng == "") {
                alert("Enter a valid Latitude or Longitude!");
                return;
            }
        }



function isFloatNumber(item,evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode==46)
        {
            var regex = new RegExp(/\./g)
            var count = $(item).val().match(regex).length;
            if (count > 1)
            {
            alert("Please enter valid Lat Long input only");
                return false;
            }
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter valid Lat Long input only");
            return false;
        }
        return true;
}

</script>
<?php include 'scriptfooter.php'; ?>
              