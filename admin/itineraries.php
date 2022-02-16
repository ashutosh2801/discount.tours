<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['title']) && !isset($_GET['id'])) {
	
	extract($_POST);
	
	$sql = "INSERT INTO `tour_itinerary` (`tour_id`, `title`, `datetime`, `address`, `description`, `latitude`, `longitude`, `status`, `timestamp`) VALUES ('".$_GET['tour_id']."', '".addslashes($title)."', '".$datetime."', '".addslashes($address)."', '".addslashes($description)."', '".$latitude."', '".$longitude."', '1', '".date('Y-m-d H:i:s')."');";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: itineraries.php?tour_id='.$_GET['tour_id'].'&id='.$conn->insert_id);
		exit;
	}
}

if(isset($_POST['title']) && isset($_GET['id'])) {
	
	extract($_POST);
	
	$sql = "UPDATE `tour_itinerary` SET `tour_id`='".$_GET['tour_id']."', `title`='".addslashes($title)."', `datetime`='".$datetime."', `address`='".addslashes($address)."', `description`='".addslashes($description)."', `latitude`='".$latitude."', `longitude`='".$longitude."', `status`=1  WHERE `ID` = ".$_GET['id'].";";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: itineraries.php?tour_id='.$_GET['tour_id']);
		exit;
	}
}

if(!empty($_GET['tour_id']) && !empty($_GET['id']) && ($_GET['act']=='remove')) {
	
	$sql = "DELETE FROM `tour_itinerary` WHERE `ID` = ".$_GET['id'].";";
	if ($conn->query($sql) === TRUE) {
		$_SESSION['msg'] = 'Record Deleted!';
		header('Location: itineraries.php?tour_id='.$_GET['tour_id']);
		exit;
	}
}

$model2 = array();
if(!empty($_GET['id'])) {
	$sql2 = "SELECT * FROM tour_itinerary WHERE ID=".$_GET['id'];
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		$model2 = $result2->fetch_object();
	} else {
		$msg = 'Invalid ID!';
		header('Location: error.php?msg='.$msg);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Itinarery :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcOT-pl9WzTeZCW3JBHNmASDRD10vFfvM&libraries=places"></script>
</head>
<body onLoad="init();">

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
                <li><a href="itineraries.php?tour_id=<?php echo $_GET['tour_id']; ?>">Itinarery</a><span>«</span></li>
                <li>Add New</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Itinerary &raquo; <?php if(isset($_GET['tour_id'])) { $t = tour_detail($conn, $_GET['tour_id']); echo $t->title; } ?></h2>
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
                      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <h2 class="w3_inner_tittle"><?php echo isset($model2->title)?'Update':'Add New'; ?></h2>
                        <div class="grid-100">
                          <div class="form-body">
                            
                            <div class="form-group">
                              <label for="title" class="col-sm-3 control-label">Title</label>
                              <div class="col-sm-9">
                                <input type="text" required="true" class="form-control1" name="title" id="title" placeholder="Name" value="<?php echo isset($model2->title)?$model2->title:''; ?>">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="datetime" class="col-sm-3 control-label">DateTime</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control1" name="datetime" id="datetime" placeholder="Date Time" value="<?php echo isset($model2->datetime)?$model2->datetime:''; ?>">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="address" class="col-sm-3 control-label">Address</label>
                              <div class="col-sm-9">
                                <input type="text" required="true" class="form-control1" name="address" id="address" placeholder="Address" value="<?php echo isset($model2->address)?$model2->address:''; ?>">
                                <input type="hidden" name="latitude" id="latitude" value="<?php echo isset($model2->latitude)?$model2->latitude:''; ?>">
                                <input type="hidden" name="longitude" id="longitude" value="<?php echo isset($model2->longitude)?$model2->longitude:''; ?>">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="description" class="col-sm-3 control-label">Description</label>
                              <div class="col-sm-9">
                                <textarea class="form-control1" name="description" id="description" placeholder="Description"><?php echo isset($model2->description)?$model2->description:''; ?></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="status" class="col-sm-3 control-label">Status</label>
                              <div class="col-sm-9">
                                <select required="true" name="status" id="status" class="form-control1">
                                  <option <?php if(isset($model2->status) && $model2->status==0) echo 'selected'; ?> value="1">Active</option>
                                  <option <?php if(isset($model2->status) && $model2->status==0) echo 'selected'; ?> value="0">Inactive</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-sm-3 control-label"> </label>
                              <div class="col-sm-8">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?php echo isset($model2->title)?'Update':'Submit'; ?></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>  
                    </div> 
                    </div>
                    <div class="col-md-8">
                      <div class="agile-tables">
                        <div class="w3l-table-info agile_info_shadow">
                          <h2 class="w3_inner_tittle">List View</h2>
                          <table id="table">
                            <thead>
                              <tr>
                              <th>Title</th>
                              <th>Address</th>
                              <th>DateTime</th>
                              <th>LatLong</th>
                              <th>Status</th>
                              <th width="150">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM tour_itinerary WHERE tour_id=".$_GET['tour_id']." ORDER BY `ID` ASC LIMIT 0, 100";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_object()) {
                            ?>
                              <tr>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->address; ?></td>
                                <td><?php echo $row->datetime; ?></td>
                                <td><?php echo number_format($row->latitude,4).",".number_format($row->longitude,4); ?></td>
                                <td><?php echo $row->status?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>'; ?></td>
                                <td>
                                  <a href="itineraries.php?tour_id=<?php echo $_GET['tour_id']; ?>&id=<?php echo $row->ID; ?>" class="badge badge-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                  <a href="itineraries.php?tour_id=<?php echo $_GET['tour_id']; ?>&id=<?php echo $row->ID; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                              </tr>
                              <?php if($row->description) { ?>
                              <tr>
                                <td><strong>Description</strong></td>
                                <td colspan='5'><?php echo $row->description; ?></td>
                              </tr>
                              <?php } ?>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='6'>No records found.</td></tr>";
                            }
                            ?>
                            </tbody>
                          </table> 
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
<script>
var placeSearch, autocomplete, auto_complete;
var componentForm = {
  street_number: 'long_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'long_name'
};

function init() {
	var options = { language:'en-GB', types:['geocode'], componentRestrictions:{country: "ca"} };
	autocomplete = new google.maps.places.Autocomplete( (document.getElementById('address')), options );
	autocomplete.addListener('place_changed', fillInAddress);
}
function fillInAddress() {
  var place = autocomplete.getPlace();
  document.getElementById('latitude').value = place.geometry.location.lat();
  document.getElementById('longitude').value = place.geometry.location.lng();
}

function geolocate() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var geolocation = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			var circle = new google.maps.Circle({
				center: geolocation,
				radius: position.coords.accuracy
			});
			autocomplete.setBounds(circle.getBounds());
		});
	}
}
</script>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#table').basictable();
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