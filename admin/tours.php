<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['order'])) {
	foreach($_POST['order'] as $id) {
		$order = "order_$id";
		$order = addslashes($_POST[$order]);
		$sql = "UPDATE `tour_tours` SET `order`='".$order."' WHERE ID=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Order updated!';
	header('Location: tours.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM tour_tours WHERE ID=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted!';
		header('Location: tours.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='update')) {
	
	$status = $_GET['st'] ? 1 : 0;
	$sql = "UPDATE `tour_tours` SET status=".$status." WHERE ID=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been updated!';
		header('Location: tours.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tours :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<style>
.dropbtn { border: none; }
.dropdown { position: relative; display: inline-block; }
.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
		padding:10px;
		background:#fff;
}
.dropdown-content a {
    text-decoration: none;
    display: block;
		padding:8px;
		margin-bottom:5px;
}
.dropdown:hover .dropdown-content {display: block;}
</style>
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
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Tours</h2>
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
                <div class="form-group">
                  <a href="add_new_tour.php" class="btn btn-primary btn-flat btn-pri" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                  <?php /*?><input class="btn btn-success" type="submit" name="update" value="Update" /><?php */?>
                  <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>

                </div>
                <table id="table">
                  <thead>
                    <tr>
                    <th style="text-align:center">Order</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Tour Type</th>
                    <th>Duration</th>
                    <th>Adults price</th>
                    <th>Status</th>
                    <th width="210">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = "SELECT * FROM tour_tours ORDER BY `order` ASC LIMIT 0, 100";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											while($row = $result->fetch_object()) {
									?>
                    <tr>
                      <td>
                      	<input type="hidden" value="<?php echo $row->ID; ?>" name="order[]" />
                        <input type="number" name="order_<?php echo $row->ID; ?>" value="<?php echo $row->order; ?>" style="width:50px; text-align:center" min="1" />
                      </td>
                      <td><?php echo $row->title; ?> <?php echo $row->sub_title; ?></td>
                      <td><?php echo $row->slug; ?></td>
                      <td><?php echo str_replace(",",", ",$row->category); ?></td>
                      <td><?php echo str_replace(",",", ",$row->tour_types); ?></td>
                      <td><?php echo $row->duration; ?></td>
                      <td><?php echo $row->currency; ?>$<?php echo $row->adults_price; ?></td>
                      <td><?php echo $row->status?'<a onClick="return confirm(\'Do you want to inactive?\')" href="tours.php?id='.$row->ID.'&act=update&st=0" class="badge badge-success">Active</a>':'<a onClick="return confirm(\'Do you want to active?\')" href="tours.php?id='.$row->ID.'&act=update&st=1" class="badge badge-danger">Inactive</a>'; ?></td>
                      <td>
                      	<div class="dropdown">
												<a href="update_tour.php?id=<?php echo $row->ID; ?>" class="badge badge-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
												<a href="tours.php?id=<?php echo $row->ID; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Delete</a>
                        <a href="view_tour.php?id=<?php echo $row->ID; ?>" class="badge badge-success dropbtn"><i class="fa fa-arrow-down"></i> More</a>
                        <div class="dropdown-content">
                          <a href="reviews.php?tour_id=<?php echo $row->ID; ?>" class="badge badge-info"><i class="fa fa-comment"></i> Review</a>
                        	<a href="itineraries.php?tour_id=<?php echo $row->ID; ?>" class="badge badge-success"><i class="fa fa-plus"></i> Itinerary</a>
                        	<a href="gallery.php?tour_id=<?php echo $row->ID; ?>" class="badge badge-primary"><i class="fa fa-image"></i> Gallery</a>
													<a href="view_tour.php?id=<?php echo $row->ID; ?>" class="badge badge-warning"><i class="fa fa-eye"></i> View</a>
                        </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                  		}
									} else {
											echo "<tr><td>No records found.</td></tr>";
									}
									?>
                  </tbody>
                </table>
                
                <br>
                <div class="form-group">
                  <?php /*?><input class="btn btn-success" type="submit" name="update" value="Update" /><?php */?>
                  <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
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