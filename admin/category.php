<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM `".PREFIX."category` WHERE cat_id=".$_GET['id'].";";
	$conn->query($sql);

	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted.';
		header('Location: category.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Category :: <?php echo SITENAME; ?></title>
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
                <li><a href="category.php">Category</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Category</h2>
            <!-- tables -->
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <form action="" method="get" autocomplete="off">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                    <input type="text" name="q" placeholder="e.g. Name etc" autocomplete="off" value="<?php echo isset($_GET['q'])?$_GET['q']:''?>" />
                    </div>
                    <div class="col-md-3">
                        <div style="margin-top:8px;">
                          <button type="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                    	<a href="category_new.php" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-user"></i> Add New</a>
                    </div>
                  </div>
                </div>
                </form>
                <form action="" method="post">
                <table id="table"  class="table">
                  <thead>
                    <tr>
                      <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                      <th>#ID</th>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Is Menu</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = "";
									if(!empty($_GET['q'])) {
										$condition = "WHERE cat_name like '%".$_GET['q']."%'";
									}
									//echo $condition;
									
									$sql = "SELECT * FROM `".PREFIX."category` $condition ORDER BY cat_id ASC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											while($row = $result->fetch_object()) {
									?>
                    <tr bgcolor="#d4e8d4">
                    	<td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->cat_id; ?>" /></td>
                      <td>
												<?php echo $row->cat_id; ?>
                      	<input type="hidden" value="<?php echo $row->cat_id; ?>" name="cust[]" />
                      </td>
                      <td><a target="_blank" href="https://www.toniagara.com/niagara-falls-<?php echo $row->cat_slug; ?>"><?php echo $row->cat_name; ?></a></td>
                      <td><a target="_blank" href="https://www.toniagara.com/niagara-falls-<?php echo $row->cat_slug; ?>"><?php echo $row->cat_title; ?></a></td>
                      <td><?php echo $row->is_menu ? 'Yes' : 'No'; ?></td>
                      <td><a target="_blank" href="https://www.toniagara.com/niagara-falls-<?php echo $row->cat_slug; ?>"><?php echo $row->cat_slug; ?></a></td>
                      <td><?php echo $row->cat_status ? '<a class="badge badge-success">Active</a>' : '<a class="badge badge-warning">Inactive</a>'; ?></td>
                      <td>
                      	<a href="category.php?id=<?php echo $row->cat_id; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                      	<a href="category_update.php?id=<?php echo $row->cat_id; ?>" class="badge badge-success"><i class="fa fa-pencil"></i> Edit</a>
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
                </form>
                <?php /*?><br>
                <div class="form-group">
                  <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
                </div><?php */?>
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
	//$('#table').basictable();
	$(".select-all").click(function () {
     $('.checkbox').not(this).prop('checked', this.checked);
	});
	$('#dates').daterangepicker({
		locale: {
      format: 'YYYY-MM-DD'
    },
		ranges: {
			 'Today': [moment(), moment()],
			 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			 'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			 'This Month': [moment().startOf('month'), moment().endOf('month')],
			 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		}
	});
});
</script>
</body>
</html>