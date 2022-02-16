<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$model = array();

if(isset($_POST['tour_id'])) {
	
	extract($_POST);
	
	if($_FILES['avatar']['name']) {
		$target_dir 	= "../uploads/profile/";
		$extension 		= strtolower(pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION));
		$avatar = date('Ymdhis')."_".rand(100,999).".$extension";
		$target_file 	= $target_dir . $avatar;
		move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
		$sql2.= "`avatar`='".addslashes($avatar)."',";
	}
	$status = $status ? 1 : 0;
	
	$sql = "UPDATE `tour_reviews` SET `tour_id`='".$tour_id."', `name`='".addslashes($name)."', `description`='".addslashes($description)."', `count_star`='5', `created_on`='".$created_on.' '.date('H:i:s')."', ".$sql2."  `status`=$status  WHERE `tour_reviews`.`ID` = ".$_GET['id'].";";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: update_review.php?id='.$_GET['id']);
		exit;
	}
	
};

$sql = "SELECT * FROM tour_reviews WHERE ID=".$_GET['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$model = $result->fetch_object();
	//echo '<pre>'; print_r($model); exit; 
} else {
	$msg = 'Invalid ID!';
	header('Location: error.php?msg='.$msg);
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Review :: <?php echo SITENAME; ?></title>
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
                <li><a href="reviews.php?tour_id=<?php echo $model->tour_id; ?>">Reviews</a><span>«</span></li>
                <li>Update</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            
             <span style="float:right;">
             <a href="add_new_review.php" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a> &nbsp; 
             
             <button type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Update </button>
             </span>
             
					  <h2 class="w3_inner_tittle">Update [<?php $t = tour_detail($conn, $model->tour_id); echo $t->title; ?>]</h2>
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
                                	<option <?php if($tour->ID==$model->tour_id) echo 'selected'; ?> value="<?php echo $tour->ID; ?>"><?php echo $tour->title; ?></option>
                                	<?php } ?>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-3 control-label">Name</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="name" id="name" placeholder="Name" value="<?php echo $model->name; ?>">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="created_on" class="col-sm-3 control-label">Date</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="created_on" id="created_on" placeholder="Date" value="<?php echo $model->created_on; ?>">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="avatar" class="col-sm-3 control-label">Avatar</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" name="avatar" id="avatar" />
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="status" class="col-sm-3 control-label">Status</label>
                              <div class="col-sm-8">
                              	<select required="true" name="status" id="status" class="form-control1">
                                	<option <?php if($model->status==0) echo 'selected'; ?> value="0">Inactive</option>
                                	<option <?php if($model->status==1) echo 'selected'; ?> value="1">Active</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                            	<label class="col-sm-3 control-label"> </label>
                              <div class="col-sm-8">
            										<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Update</button>
                              </div>
                            </div>
                            
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <div class="grid-1">
                          <div class="form-body">
                              <div class="form-group"> 
                                  <textarea class="form-control1" name="description" id="description"><?php echo $model->description; ?></textarea> 
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