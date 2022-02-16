<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$model = array();
$sql = "SELECT * FROM tour_reviews WHERE ID=".$_GET['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$model = $result->fetch_object();
} else {
	$msg = 'Invalid ID!';
	header('Location: error.php?msg='.$msg);
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>View Review :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
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
                <li><?php echo $model->name; ?></li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
          	<span style="float:right;">
            	<a href="add_new_review.php" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
              <a href="update_review.php?id=<?php echo $model->ID; ?>" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Edit</a>
            </span>
					  <h2 class="w3_inner_tittle">View [<?php echo $model->name; ?>]</h2>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <table id="table" style="vertical-align:top">
                            <tr>
                              <td width="15%">Tour Title</td>
                              <td><?php $t = tour_detail($conn, $model->tour_id); echo $t->title; ?></td>
                            </tr>
                            <tr>
                              <td>Name</td>
                              <td><?php echo $model->name; ?> </td>
                            </tr>
                            <tr>
                              <td>Comment</td>
                              <td><?php echo $model->description; ?> </td>
                            </tr>

                            <tr>
                              <td>Stars</td>
                              <td><?php echo $model->count_star; ?></td>
                            </tr>

                            <tr>
                              <td>Posted On</td> 
                              <td><?php echo $model->created_on; ?></td> 
                            </tr>
                             
                            
                          </table>
              </div>
        		</div>
          </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
</body>
</html>