<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if( isset($_POST['email']) ) {
	
	extract($_POST);
	$username = preg_replace('/[^a-zA-Z0-9]+/', '', $username);
	
	$sql = "INSERT INTO `tour_users` (`username`, `password`, `email`, `phone`, `name`, `status`, `created_on`, `token`, `role`) VALUES ('".$username."', '".$password."', '".$email."', '".$phone."', '".$name."', '1', '".date('Y-m-d H:i:s')."', '".md5(rand(0,9999))."','2');";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: agent_update.php?id='.$conn->insert_id);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add New Agent :: <?php echo SITENAME; ?></title>
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
                <li><a href="agents.php">Agents</a><span>«</span></li>
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
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                  <!--<h3 class="w3_inner_tittle two">Title & Types</h3>-->
                  <div class="grid-1">
                      <div class="form-body">

                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Full Name</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="text" required="true" class="form-control1" name="name" id="name" placeholder="Full Name">
                          </div>
                        </div>
                        
                        <div class="form-group"> 
                           <label class="col-sm-3 col-xs-12 control-label">Username</label>
                           <div class="col-sm-9 col-xs-12">    
                              <input type="text" required="true" class="form-control1" name="username" id="username" placeholder="Username"> 
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="created_on" class="col-sm-3 col-xs-12 control-label">Email Address</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <input type="text" required="true" class="form-control1" name="email" id="email" placeholder="Email">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="created_on" class="col-sm-3 col-xs-12 control-label">Password</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <input type="password" required="true" class="form-control1" name="password" id="password" placeholder="Password" value="" />
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="created_on" class="col-sm-3 col-xs-12 control-label">Phone Number</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <input type="text" required="true" class="form-control1" name="phone" id="phone" placeholder="Phone">
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
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create an account</button>
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
<script type="text/javascript" src="summernote/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#addons_desc').summernote({
		height: 250,
  });
});
</script>
</body>
</html>