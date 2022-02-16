<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['tour_id'])) {
	
	extract($_POST);
	
	$status = $status ? 1 : 0;
	
	$sql = "INSERT INTO `tour_reviews` (`tour_id`, `name`, `description`, `count_star`, `created_on`, `status`, `timestamp`) VALUES ('".$tour_id."', '".addslashes($name)."', '".addslashes($description)."', '5', '".$created_on.' '.date('H:i:s')."', '$status', '".date('Y-m-d H:i:s')."');";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: update_review.php?id='.$conn->insert_id);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add New Review :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
</head>
<body>

<!-- banner -->
<div class="wthree_agile_admin_info">
		<!-- /w3_agileits_top_nav-->
		<!-- /nav-->
		<div class="w3_agileits_top_nav">
			<?php require_once('includes/leftbar.php'); ?>
		</div>
		<!-- //nav -->
			
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
        <!-- /inner_content_w3_agile_info-->
        
          <!-- breadcrumbs -->
          <div class="w3l_agileits_breadcrumbs">
            <div class="w3l_agileits_breadcrumbs_inner">
              <ul>
                <li><a href="index.php">Dashboard</a><span>«</span></li>
                <li><a href="tours.php">Tours</a><span>«</span></li>
                <li><a href="reviews.php">Reviews</a><span>«</span></li>
                <li>Add New</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            
             <button style="float:right;" type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
					  <h2 class="w3_inner_tittle">Add New <?php if(isset($_GET['tour_id'])) { $t = tour_detail($conn, $_GET['tour_id']); echo " [ ".$t->title." ] "; } ?></h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <!--<h3 class="w3_inner_tittle two">Title & Types</h3>-->
                      <div class="grid-1">
                          <div class="form-body">

                            <div class="form-group">
                              <label for="tour_id" class="col-sm-3 control-label">Tours</label>
                              <div class="col-sm-8">
                              	<select required="true" name="tour_id" id="tour_id" class="form-control1">
                                	<?php $result = tours($conn); ?>
																	<?php while($tour = $result->fetch_object()) { ?>
                                	<option <?php if(isset($_GET['tour_id']) && $tour->ID==$_GET['tour_id']) echo 'selected'; ?> value="<?php echo $tour->ID; ?>"><?php echo $tour->title; ?></option>
                                	<?php } ?>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-3 control-label">Name</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="name" id="name" placeholder="Name">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="created_on" class="col-sm-3 control-label">Date</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="created_on" id="created_on" placeholder="Date">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="status" class="col-sm-3 control-label">Status</label>
                              <div class="col-sm-8">
                              	<select required="true" name="status" id="status" class="form-control1">
                                	<option value="0">Inactive</option>
                                	<option value="1">Active</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                            	<label class="col-sm-3 control-label"> </label>
                              <div class="col-sm-8">
            										<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
                              </div>
                            </div>
                            
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <div class="grid-1">
                          <div class="form-body">
                              <label for="description" class="control-label">Description</label>
                              <div class="form-group"> 
                                  <textarea class="form-control1" style="height:150px !important" name="description" id="description" required="true"></textarea> 
                              </div> 
                              <div class="clearfix"></div>
                         </div>
                      </div>
                    </div>            
                  </div>
            </div>
            </form>
          </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">
$(function () {
	 $("#created_on").datepicker({
			 changeMonth: true,
			 changeYear: true,
			 dateFormat: 'yy-mm-dd'
	 });
});
</script>
<script type="text/javascript" src="js/valida.2.1.6.min.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
	$('.form-horizontal').valida();
});
</script>
<script type="text/javascript" src="js/validator.min.js"></script>
<?php /*?><script type="text/javascript" src="summernote/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#description').summernote({
		height: 250,
  });
});
</script><?php */?>
</body>
</html>