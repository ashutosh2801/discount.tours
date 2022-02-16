<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if( isset($_POST['campaign']) ) {
	
	extract($_POST);
	$status = $status ? 1 : 0;
	$dt = explode(" - ",$date);
	
	$sql = "INSERT INTO `tour_discount` (`campaign`, `discount`, `discount_type`, `discount_name`, `start_date`, `end_date`, `status`) VALUES ('".$campaign."', '".$discount."', '".$discount_type."', '".$discount_name."', '".$dt[0]."', '".$dt[1]."', '".$status."');";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: discounts.php?id='.$conn->insert_id);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add New Discount :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                <li><a href="discounts.php">Discounts</a><span>«</span></li>
                <li>Add New</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            
					  <h2 class="w3_inner_tittle">Add New</h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
              <div class="row set-1_w3ls">
                <div class="col-md-4 button_set_one agile_info_shadow graph-form">
                  <!--<h3 class="w3_inner_tittle two">Title & Types</h3>-->
                  <div class="grid-1">
                      <div class="form-body">

                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Campaign</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="text" required="true" class="form-control1" name="campaign" id="campaign" placeholder="Campaign"  value="<?php echo isset($_POST['campaign'])?$_POST['campaign']:''; ?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label">Date Range</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <input type="text" name="date" id="dates" placeholder="Date range" autocomplete="off" value="<?php echo isset($_POST['date'])?$_POST['date']:''; ?>" />
                          </div>
                        </div>
                         
                        <div class="form-group">
                          <label for="discount" class="col-sm-3 col-xs-12 control-label">Discount</label>
                          <div class="col-sm-5 col-xs-12 ">
                            	<input type="text" required="true" class="form-control1 icon" name="discount" id="discount" placeholder="Discount"  value="<?php echo isset($_POST['discount'])?$_POST['discount']:''; ?>" />
                          </div>
                          <div class="col-sm-4 col-xs-12 ">    
                              <select required="true" name="discount_type" id="discount_type" class="form-control1">
                                <option value="%">%</option>
                                <option value="$">$</option>
                              </select>
                         </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label">Type</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <select required="true" name="discount_name" id="discount_name" class="form-control1">
                              <option value="booking">Per booking</option>
                              <option value="person">Per person</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label">Status</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <select required="true" name="status" id="status" class="form-control1">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label"> </label>
                          <div class="col-sm-9 col-xs-12 ">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                          </div>  
                        </div>
                        
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
<script type="text/javascript" src="js/valida.2.1.6.min.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
	//$('.form-horizontal').valida();
});
</script>
<script type="text/javascript" src="js/validator.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#dates').daterangepicker({
		locale: {
      format: 'YYYY-MM-DD'
    },
	});
});
</script>
</body>
</html>