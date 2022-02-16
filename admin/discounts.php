<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM tour_discount WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted!';
		header('Location: discounts.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='update')) {
	
	$status = $_GET['st'] ? 1 : 0;
	$sql = "UPDATE `tour_discount` SET status=".$status." WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been updated!';
		header('Location: discounts.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Discounts :: <?php echo SITENAME; ?></title>
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
                <li><a href="discounts.php">Discounts</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Discounts</h2>
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
                  <a href="discount_addnew.php" class="btn btn-primary btn-flat btn-pri" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                  <?php /*?><input class="btn btn-success" type="submit" name="update" value="Update" />
                  <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button><?php */?>

                </div>
                <table id="table">
                  <thead>
                    <tr>
                    <th style="text-align:center">#</th>
                    <th>Campaign</th>
                    <th>Discount</th>
                    <th>Date Range</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th width="210">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $sql = "SELECT * FROM tour_discount ORDER BY `id` ASC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) { $i=1;
											while($row = $result->fetch_object()) {
									?>
                    <tr>
                      <td style="text-align:center"><?php echo $i++; ?></td>
                      <td width="300"><?php echo $row->campaign; ?></td>
                      <td><?php echo $row->discount_type=='$'?'$'.$row->discount:$row->discount.'%'; ?></td>
                      <td><?php echo $row->start_date." - ".$row->end_date; ?></td>
                      <td>Per <?php echo $row->discount_name; ?></td>
                      <td><?php echo $row->status?'<a onClick="return confirm(\'Do you want to inactive?\')" href="discounts.php?id='.$row->id.'&act=update&st=0" class="badge badge-success">Active</a>':'<a onClick="return confirm(\'Do you want to active?\')" href="discounts.php?id='.$row->id.'&act=update&st=1" class="badge badge-danger">Inactive</a>'; ?></td>
                      <td>
												<a href="discounts_edit.php?id=<?php echo $row->id; ?>" class="badge badge-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
												<a href="discounts.php?id=<?php echo $row->id; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Delete</a>
                      </td>
                    </tr>
                  <?php
                  		}
									} else {
											echo "<tr><td colspan='7'>No records found.</td></tr>";
									}
									?>
                  </tbody>
                </table>
                
                <br>
                <div class="form-group">
                  <?php /*?><input class="btn btn-success" type="submit" name="update" value="Update" />
                  <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button><?php */?>
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