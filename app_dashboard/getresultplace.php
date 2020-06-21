<?php
require_once("config.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from app_placesmain order by id DESC";
$paginationlink = "getresultplace.php?page=";	
$pagination_setting = $_GET["pagination_setting"];
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}

if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
}

$output = '';

?>




<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete?');
}
</script>

<style>
.link {padding: 10px 15px;background: transparent;border:#bccfd8 1px solid;border-left:0px;cursor:pointer;color:#607d8b}
.disabled {cursor:not-allowed;color: #bccfd8;}
.current {background: #bccfd8;}
.first{border-left:#bccfd8 1px solid;}
.question {font-weight:bold;}
.answer{padding-top: 10px;}
#pagination{margin-top: 20px;padding-top: 30px;border-top: #F0F0F0 1px solid;}
.dot {padding: 10px 15px;background: transparent;border-right: #bccfd8 1px solid;}
#overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
#overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
.page-content {padding: 20px;margin: 0 auto;}
.pagination-setting {padding:10px; margin:5px 0px 10px;border:#bccfd8  1px solid;color:#607d8b;}

</style>
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-map-marker fa-5" aria-hidden="true"></i> All Places</h3>

              <div class="box-tools">
                  
                <div class="input-group input-group-sm" style="width: 150px;">
                   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here..." title="Type a name ">


                  <div class="input-group-btn">
                      
                  </div>
                  
                </div>
                     
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="myTable">
                <tbody><tr>
                  
                  <th>Name</th>
                  
                  <th>Image</th>
                  
                  <th>Look</th>
                  <th>Manage</th>
                </tr>
                <?php if (is_array($faq) || is_object($faq))
{foreach($faq as $k=>$v) { ?>
                 
                <tr>

                  
                  <td><?php echo $faq[$k]['title'];?></td>
                  
                  <td><img src="<?php echo $faq[$k]['image'];?>" height="100" width="100"></td>
                   
  <td><a href="viewplace.php?id=<?php echo base64_encode($faq[$k]['id']);?>"><button class=" btn btn-primary" >View <i class="fa fa-eye" aria-hidden="true"></i></button></a></td>                
                  <td><a href="editplace.php?id=<?php echo base64_encode($faq[$k]['id']);?>"><button class=" btn btn-primary  btn-success" >Edit <i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                  <a href="editimage.php?id=<?php echo base64_encode($faq[$k]['id']);?>"><button type="button" class="btn btn-primary btn-warning" >Edit images <i class="fa fa-picture-o" aria-hidden="true"></i></button></a>
                                 <a href="deleteplace.php?id=<?php echo base64_encode($faq[$k]['id']);?>" class="btn btn-social-icon btn-google" onClick="return checkDelete()" ><i class="fa fa fa-trash-o"></i></a> </td>

 
 <?php  }}else { echo '<center><h2><br> No result to display. Please add a place.</h2></center>'; }?>
                </tr>
              </tbody></table>
                             
               




<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>





 <?php
 
if(!empty($perpageresult)) {
$output .= '<div id="pagination" class="pagination">' . $perpageresult . '</div>';
}
print $output;
?>
