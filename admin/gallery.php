<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['update'])) {
	foreach($_POST['order'] as $key => $val ) {
		$sql = "SELECT * FROM `tour_gallery` WHERE `ID` = $key;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sql2 = "UPDATE `tour_gallery` SET `tour_order` = '$val' WHERE `tour_gallery`.`ID` = $key;";
			$conn->query($sql2);
		}
	}
	$_SESSION['msg'] = 'Record Saved!';
	header('Location: gallery.php?tour_id='.$_GET['tour_id']);
	exit;
}

if(isset($_POST['submit'])) {
	$sql = "INSERT INTO `tour_gallery` (`tour_id`, `image_name`, `type`, `status`, `timestamp`) VALUES ('".$_GET['tour_id']."', '".$_POST['photo']."', 'Video', '1', '".date('Y-m-d H:i:s')."');;";
	if ($conn->query($sql) === TRUE) {
		$val = $conn->insert_id;
		$sql2 = "UPDATE `tour_gallery` SET `tour_order` = '$val' WHERE `ID` = $val;";
		$conn->query($sql2);
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: gallery.php?tour_id='.$_GET['tour_id']);
		exit;
	}
}

if(!empty($_GET['tour_id']) && !empty($_GET['id']) && ($_GET['act']=='remove')) {
	
	$sql = "DELETE FROM `tour_gallery` WHERE `ID` = ".$_GET['id'].";";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Deleted!';
		header('Location: gallery.php?tour_id='.$_GET['tour_id']);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Gallery :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css" />
<script type="text/javascript" src="js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="js/js-script.js"></script>
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
                <li><a href="gallery.php?tour_id=<?php echo $_GET['tour_id']; ?>">Gallery</a><span>«</span></li>
                <li>Add New</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Gallery &raquo; <?php if(isset($_GET['tour_id'])) { $t = tour_detail($conn, $_GET['tour_id']); echo $t->title; } ?></h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
                  <div class="row set-1_w3ls">
                    <div class="col-md-4">
                    <div class="button_set_one agile_info_shadow graph-form">
                        <h2 class="w3_inner_tittle"><?php echo isset($model2->title)?'Update':'Add New'; ?></h2>
                        <div class="grid-100">
                          <div class="form-body">
                            
                            <div class="form-group">
                              <label><input type="radio" value="Image" name="type" id="image" checked> Image</label>
                              <label><input type="radio" value="Video" name="type" id="video"> YouTube Video</label>
                            </div>
                              
                            <form action="upload_photo.php" method="post" enctype="multipart/form-data" target="upload_frame" onsubmit="submit_photo()" id="image_type">
                              <div class="form-group">
                              	<label for="photo">Image</label>
                                <input type="file" name="photo" id="photo" class="file_input">
                                <div id="loading_progress"></div>
                                <button type="submit" name="submit" class="btn btn-success" id="upload_btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Upload Photo</button>
                              </div>
                            </form>
                            
                            <form action="" method="post" enctype="multipart/form-data" id="video_type" style="display:none">
                              <input type="hidden" value="Video" name="type">
                              <div class="form-group">
                              	<label for="photo">YouTube Video ID</label>
                                <input type="text" name="photo" class="form-control" placeholder="YouTube Video ID">
                              </div>
                              <div class="form-group">  
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Upload Video</button>
                              </div>  
                            </form>
                            
                            <iframe name="upload_frame" class="upload_frame"></iframe>
                            
                            
                            <div id="popup_crop">
                                <div class="form_crop">
                                    <span class="close" onclick="close_popup('popup_crop')">x</span>
                                    <h2>Crop photo</h2>
                                    <!-- This is the image we're attaching the crop to -->
                                    <div class="form-group"><img id="cropbox" /></div>
                                    
                                    <!-- This is the form that our event handler fills -->
                                    <form>
                                        <input type="hidden" id="x" name="x" />
                                        <input type="hidden" id="y" name="y" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="hidden" id="photo_url" name="photo_url" />
                                        <input type="hidden" id="image_path" name="image_path" />
                                        <input type="hidden" id="image_name" name="image_name" />
                                        <input type="hidden" id="tour_id" name="tour_id" value="<?php echo $_GET['tour_id'] ?>" />
                                        <div class="form-group">
                                        <input type="text" class="form-control1" name="title" placeholder="Description (Optional)" id="title">
                                        </div>
                                        <input type="button" value="Crop Image" id="crop_btn" class="btn btn-success" onclick="crop_photo()" />
                                    </form>
                                </div>
                            </div>
                            
                            
                          </div>
                        </div>
                    </div> 
                    </div>
                    <div class="col-md-8">
                      <div class="agile-tables">
                        <div class="w3l-table-info agile_info_shadow">
                          <h2 class="w3_inner_tittle">List View</h2>

                          <form action="" method="post">
                          <table id="table">
                            <thead>
                              <tr>
                              <th>Order</th>
                              <th>Thumb</th>
                              <th>Type</th>
                              <th>Status</th>
                              <th width="150">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="row_position">
                            <?php
                            $sql = "SELECT * FROM tour_gallery WHERE tour_id=".$_GET['tour_id']." ORDER BY `tour_order` DESC LIMIT 0, 200";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
															$k=$result->num_rows;
                              while($row = $result->fetch_object()) {
                            ?>
                              <tr id="<?php echo $row->ID; ?>">
                              	<td><input type="text" name="order[<?php echo $row->ID; ?>]" value="<?php echo $row->tour_order; ?>" style="width:50px; text-align:center" /></td>
                                <?php if($row->type=='Video') { ?>
                                <td><img height="96" src="https://img.youtube.com/vi/<?php echo $row->image_name; ?>/0.jpg" /></td>
                                <?php } else if($row->type=='Image') { ?>
                                <td><img height="80" src="../uploads/tours/thumb/<?php echo $row->image_name; ?>" /></td>
                                <?php } ?>
                                <td><?php echo $row->type; ?></td>
                                <td><?php echo $row->status?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>'; ?></td>
                                <td>
                                  <a href="gallery.php?tour_id=<?php echo $_GET['tour_id']; ?>&id=<?php echo $row->ID; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                              </tr>
                            <?php
                              }
														?>
                            <tfoot>
                             <tr>
                               <th colspan="5"><input type="submit" class="btn btn-danger" name="update" value="Update All" /></th>
                             </tr>
                            </tfoot>
                                <?php
                            } else {
                                echo "<tr><td colspan='6'>No records found.</td></tr>";
                            }
                            ?>
                            </tbody>
                          </table> 
                          </form>
                        </div>
                      </div>  
                      <div class="clearfix"></div>
                    </div> 
                    </div>           
                  </div>
            </div>
          </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$( ".row_position" ).sortable({
	delay: 150,
	stop: function() {
			var selectedData = new Array();
			$('.row_position>tr').each(function() {
					selectedData.push($(this).attr("id"));
			});
			updateOrder(selectedData);
	}
});


function updateOrder(data) {
	$.ajax({
			url:"ajax/gallery.php",
			type:'post',
			data:{position:data},
			success:function(){
					alert('Your change successfully saved');
			}
	})
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	
	$('#table').basictable();
	
	$('#video').click(function(){
		$('#video_type').show();
		$('#image_type').hide();
	});

	$('#image').click(function(){
		$('#video_type').hide();
		$('#image_type').show();
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
<script type="text/javascript" src="summernote/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#description1').summernote({
		height: 250,
  });
});
</script>
</body>
</html>