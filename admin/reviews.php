<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['order'])) {
	foreach($_POST['order'] as $id) {
		$order = "order_$id";
		$order = addslashes($_POST[$order]);
		$sql = "UPDATE `tour_reviews` SET `order`='".$order."' WHERE ID=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Order updated!';
	header('Location: reviews.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM tour_reviews WHERE ID=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted!';
		header('Location: reviews.php?tour_id='.$_GET['tour_id']);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Reviews :: <?php echo SITENAME; ?></title>
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
                <li><a href="reviews.php?tour_id=<?php echo $_GET['tour_id'] ?>">Reviews</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Reviews</h2>
            <!-- tables -->
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
					 ?>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <form action="" method="post">
                <div class="form-group text-right">
                  <a href="add_new_review.php?tour_id=<?php echo $_GET['tour_id']; ?>" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                  <?php /*?><input class="btn btn-success" type="submit" name="update" value="Update" /><?php */?>
                </div>
                <table id="table">
                  <thead>
                    <tr>
                    <th width="250">Tour</th>
                    <th width="200">Name</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th width="120">On Date</th>
                    <th width="220">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = '';
									if(!empty($_GET['tour_id']))
									$condition = "WHERE tour_id=".$_GET['tour_id'];
									
                  $sql = "SELECT * FROM tour_reviews $condition ORDER BY `ID` DESC LIMIT 0, 100";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											while($row = $result->fetch_object()) {
												$tour = tour_detail($conn, $row->tour_id);
									?>
                    <tr>
                      <td><?php echo $tour->title; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo stripslashes($row->description); ?></td>
                      <td><?php echo $row->status?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>'; ?></td>
                      <td><?php echo $row->created_on; ?></td>
                      <td>
												<a href="view_review.php?id=<?php echo $row->ID; ?>" class="badge badge-warning"><i class="fa fa-eye"></i> View</a>
												<a href="update_review.php?id=<?php echo $row->ID; ?>" class="badge badge-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
												<a href="reviews.php?id=<?php echo $row->ID; ?>&tour_id=<?php echo $row->tour_id; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Delete</a>
                      </td>
                    </tr>
                  <?php
                  		}
									} else {
											echo "<tr><td colspan='6'>No records found.</td></tr>";
									}
									?>
                  </tbody>
                </table>
                
                <br>
                <div class="form-group">
                  <?php /*?><input class="btn btn-success" type="submit" name="update" value="Update" /><?php */?>
                </div>
                </form>
          		</div>
            </div>
            <!-- //tables -->
				  </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#table').basictable();
});
</script>
</body>
</html>