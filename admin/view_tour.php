<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$model = array();
$sql = "SELECT * FROM tour_tours WHERE ID=".$_GET['id'];
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
<title>View Tour :: <?php echo SITENAME; ?></title>
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
                <li><?php echo $model->title; ?></li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
          	<span style="float:right;">
            	<a href="add_new_tour.php" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
              <a href="update_tour.php?id=<?php echo $model->ID; ?>" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Edit</a>
            </span>
					  <h2 class="w3_inner_tittle">View [<?php echo $model->title; ?>]</h2>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <table id="table" style="vertical-align:top">
                            <tr>
                              <td width="15%">Tour Title</td>
                              <td><?php echo $model->title; ?></td>
                            </tr>
                            <tr>
                              <td>Slug</td>
                              <td><?php echo $model->slug; ?> </td>
                            </tr>
                            <tr>
                              <td>Sub Title</td>
                              <td><?php echo $model->sub_title; ?> </td>
                            </tr>

                            <tr>
                              <td>Description</td>
                              <td><?php echo $model->description; ?></td>
                            </tr>

                            <tr>
                              <td>Adults price</td> 
                              <td><?php echo $model->adults_price; ?></td> 
                            </tr>
                             
                            <tr> 
                              <td>Seniors price</td>
                              <td><?php echo $model->seniors_price; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Children price</td>
                              <td><?php echo $model->children_price; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Infants price</td>
                              <td><?php echo $model->infants_price; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Currency</td>
                              <td><?php echo $model->currency; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Location</td>
                              <td><?php echo $model->location; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Duration</td>
                              <td><?php echo $model->duration; ?>"></td> 
                            </tr>
                            
                            <tr> 
                              <td>No. of reviews</td>
                              <td><?php echo $model->no_reviews; ?></td> 
                            </tr>

                            <tr> 
                              <td>Tour Inclusions</td>
                              <td><?php echo $model->tour_inclusions; ?></td> 
                            </tr> 

                            <tr>
                              <td>Tour Schedule</td>
                              <td><?php echo $model->tour_schedule; ?></td>
                            </tr>
                            
                            <tr>
                              <td>Tour Map</td>
                              <td><?php echo $model->tour_map; ?></td>
                            </tr>
                            
                            <tr>
                              <td>Tour Reviews</td>
                              <td><?php echo $model->tour_reviews; ?></td>
                            </tr>
                            
                            <tr>
                              <td>Pickup Information</td>
                              <td><?php echo $model->pickup_information; ?></td>
                            </tr>
                            
                            <tr>
                              <td>Cancellation Policy</td>
                              <td><?php echo $model->cancellation_policy; ?></td>
                            </tr>
                            
                            <tr>
                              <td>Frequently Asked Questions</td>
                              <td><?php echo $model->frequently_asked_questions; ?></td>
                            </tr>
                            
                            <tr>
                              <td>YouTube Link</td>
                              <td><?php echo $model->youtube_link; ?></td>
                            </tr>
                            
                            <tr>
                              <td>Xola Code</td>
                              <td><?php echo $model->xola_code; ?></td>
                            </tr>

                            <tr>
                              <td>Banner Image</td>
                              <td>
																<?php 
                                if(file_exists("../uploads/tours/".$model->banner_image)) {
                                  ?>
                                  <img src="<?php echo "../uploads/tours/".$model->banner_image; ?>" alt="<?php echo $model->banner_image; ?>" />
                                  <?php
                                }
                                ?>
                              </td>
                            </tr>
                            
                            <tr>
                              <td>Tour Thumb</td>
                              <td>
																<?php 
                                if(file_exists("../uploads/tours/thumb/".$model->tour_thumb)) {
                                  ?>
                                  <img src="<?php echo "../uploads/tours/thumb/".$model->tour_thumb; ?>" alt="<?php echo $model->tour_thumb; ?>" />
                                  <?php
                                }
                                ?>
                              </td>
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