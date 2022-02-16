<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
if(isset($_POST['title'])) {
	
	//echo '<pre>'; print_r($_REQUEST); exit;
	
	extract($_POST);
	$slug = $slug ? $slug : $title;
	$slug = urlMap($slug);
	
	$target_dir 	= "../uploads/tours/";
	$extension 		= strtolower(pathinfo($_FILES["banner_image"]["name"],PATHINFO_EXTENSION));
	$banner_image = date('Ymdhis')."_".rand(100,999).".$extension";
	$target_file 	= $target_dir . $banner_image;
	if($_FILES['banner_image']['name']) {
		move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file);
	}

	$target_dir 	= "../uploads/tours/thumb/";
	$extension 		= strtolower(pathinfo($_FILES["tour_thumb"]["name"],PATHINFO_EXTENSION));
	$tour_thumb 	= date('Ymdhis')."_".rand(100,999).".$extension";
	$target_file 	= $target_dir . $tour_thumb;
	if($_FILES['tour_thumb']['name']) {
		move_uploaded_file($_FILES["tour_thumb"]["tmp_name"], $target_file);
	}
	
	$category = is_array($_POST['category']) ? implode(",",$_POST['category']) : '';
	$tour_types = is_array($_POST['tour_types']) ? implode(",",$_POST['tour_types']) : '';

	$sql = "INSERT INTO `tour_tours` (`tour_types`, `category`, `title`, `slug`, `sub_title`, `meta_title`, `meta_keyword`, `meta_description`, `description`, `location`, `duration`, `no_reviews`, `operating_hours`, `extra_info`, `currency`, `adults_label`, `adults_price`, `adults_text`, `seniors_label`, `seniors_price`, `seniors_text`, `children_label`, `children_price`, `children_text`, `infants_label`, `infants_price`, `infants_text`, `tour_schedule`, `tour_map`, `tour_reviews`, `tour_inclusions`, `add_ons`, `pickup_information`, `cancellation_policy`, `frequently_asked_questions`, `other_information`, `banner_image`, `tour_thumb`, `youtube_link`, `xola_code`, `status`, `created_on`) VALUES ('".$tour_types."', '".$category."', '".addslashes($title)."', '".addslashes($slug)."', '".addslashes($sub_title)."', '".addslashes($meta_title)."', '".addslashes($meta_keyword)."', '".addslashes($meta_description)."', '".addslashes($description)."', '".addslashes($location)."', '".addslashes($duration)."', '".addslashes($no_reviews)."', '".addslashes($operating_hours)."', '".addslashes($extra_info)."', '".addslashes($currency)."', '".addslashes($adults_label)."', '".addslashes($adults_price)."', '".addslashes($adults_text)."', '".addslashes($seniors_label)."', '".addslashes($seniors_price)."', '".addslashes($seniors_text)."', '".addslashes($children_label)."', '".addslashes($children_price)."', '".addslashes($children_text)."', '".addslashes($infants_label)."', '".addslashes($infants_price)."', '".addslashes($infants_text)."', '".addslashes($tour_schedule)."', '".addslashes($tour_map)."', '".addslashes($tour_reviews)."', '".addslashes($tour_inclusions)."', '".addslashes($add_ons)."', '".addslashes($pickup_information)."', '".addslashes($cancellation_policy)."', '".addslashes($frequently_asked_questions)."', '".addslashes($other_information)."', '".addslashes($banner_image)."', '".addslashes($tour_thumb)."', '".addslashes($youtube_link)."', '".addslashes($xola_code)."', '1', '".date('Y-m-d H:i:s')."');";
	if ($conn->query($sql) === TRUE) {
		header('Location: update_tour.php?id='.$conn->insert_id);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add New Tour :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
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
                <li>Add New</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            
             <button style="float:right;" type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
					  <h2 class="w3_inner_tittle">Add New</h2>
            <div class="forms-main_agileits">
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Title & Types</h3>
                      <div class="grid-1">
                          <div class="form-body">

                            <div class="form-group">
                              <label for="checkbox" class="col-sm-3 control-label">Category</label>
                              <div class="col-sm-8">
                              	<div class="row">
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Home"> Home Page</label>
                                </div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Niagara Falls" checked> Niagara Falls</label>
                                </div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Niagara Falls Boat Tours"> Niagara Falls Boat Tours</label></div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Airplane Tours"> Airplane Tours</label></div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Hornblower Tours"> Hornblower Tours</label>
                                </div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Private Tours"> Private Tours</label></div>
                                </div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Winery Tours"> Winery Tours</label>
                                </div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Bus Tours"> Bus Tours</label>
                                </div>
                                <div class="col-sm-6">
                                	<label><input type="checkbox" name="category[]" value="Segway Tours"> Segway Tours</label>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="checkbox" class="col-sm-3 control-label">Tour Types</label>
                              <div class="col-sm-8">
                              	<div class="row">
                                <div class="col-sm-6">
                                <label><input type="checkbox" name="tour_types[]" value="Family Tours"> Family Tours</label>
                                </div>
                                <div class="col-sm-6">
                                <label><input type="checkbox" name="tour_types[]" value="History & Culture"> History & Culture</label></div>
                                <div class="col-sm-6">
                                <label><input type="checkbox" name="tour_types[]" value="Niagara Air Tours"> Niagara Air Tours</label></div>
                                <div class="col-sm-6">
                                <label><input type="checkbox" name="tour_types[]" value="Sightseeing tours"> Sightseeing tours</label>
                                </div>
                                <div class="col-sm-6">
                                <label><input type="checkbox" name="tour_types[]" value="Wine Tours"> Wine Tours</label></div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-3 control-label">Tour Title</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="title" placeholder="Tour Title">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="disabledinput" class="col-sm-3 control-label">Slug</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="slug" placeholder="Slug">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword" class="col-sm-3 control-label">Sub Title</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" placeholder="Sub Title" name="sub_title">
                              </div>
                            </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <div class="grid-1">
                          <div class="form-body">
                          	<div class="col-md-6">
                              <h3 class="w3_inner_tittle two">Tour Inclusions</h3>
                              <div class="form-group"> 
                                  <textarea class="form-control1" name="tour_inclusions" id="txtEditor"></textarea> 
                              </div> 
                            </div>
                            <div class="col-md-6">  
                              <h3 class="w3_inner_tittle two">Add-Ons</h3>
                              <div class="form-group"> 
                                  <textarea class="form-control1" name="add_ons" id="add_ons"></textarea> 
                              </div> 
                            </div>
                            <div class="clearfix"></div>
                                 
                         </div>
                      </div>
                    </div>            
                  </div>
                  
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Price, Location, Duration & Reviews </h3>
                      <div class="grid-1">
                          <div class="form-body">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Adults Price</label> 
                                <div class="col-sm-3"> 
                                  <input required="true" type="text" class="form-control1 icon" name="adults_label" placeholder="Adults label" value="Adults price"> 
                                </div>
                                <div class="col-sm-3">
                                <div class="input-group">
                                  <span class="input-group-addon">$</span> 
                                  <input required="true" type="text" class="form-control1 icon" name="adults_price" placeholder="Adults price" value="0"> 
                                </div>  
                                </div> 
                                <div class="col-sm-3"> 
                                  <input type="text" class="form-control1 icon" name="adults_text" placeholder="Ex - Up to 10 Passengers"> 
                                </div>
                              </div>
                               
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Seniors Price</label>
                                <div class="col-sm-3"> 
                                  <input required="true" type="text" class="form-control1 icon" name="seniors_label" placeholder="Seniors label" value="Seniors (Age 60+)"> 
                                </div>
                                <div class="col-sm-3">
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input required="true" type="text" class="form-control1 icon" name="seniors_price" placeholder="Seniors price" value="0">
                                  </div>   
                                </div> 
                                <div class="col-sm-3"> 
                                  <input type="text" class="form-control1 icon" name="seniors_text" placeholder="Ex - Up to 10 Passengers"> 
                                </div>
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Children Price</label>
                                <div class="col-sm-3"> 
                                  <input required="true" type="text" class="form-control1 icon" name="children_label" placeholder="Children label" value="Children (4-12 years)"> 
                                </div>
                                <div class="col-sm-3">
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input required="true" type="text" class="form-control1 icon" name="children_price" placeholder="Children price" value="0">
                                  </div>   
                                </div> 
                                <div class="col-sm-3"> 
                                  <input type="text" class="form-control1 icon" name="children_text" placeholder="Ex - Up to 10 Passengers"> 
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Infants Price</label>
                                <div class="col-sm-3"> 
                                  <input required="true" type="text" class="form-control1 icon" name="infants_label" placeholder="Infants label" value="Infants (0-2 years)"> 
                                </div>
                                <div class="col-sm-3">
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input required="true" type="text" class="form-control1 icon" name="infants_price" placeholder="Infants price" value="0"> 
                                  </div>  
                                </div>
                                <div class="col-sm-3"> 
                                  <input type="text" class="form-control1 icon" name="infants_text" placeholder="Free"> 
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Currency</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-language"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="currency" placeholder="" value="CA"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Location</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="location" placeholder="" value="Niagara Falls"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Duration</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-clock-o"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="duration" placeholder=""> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">No. of reviews</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="no_reviews" placeholder=""> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="operating_hours" class="col-sm-3 control-label">Operating Hours</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-clock-o"></i></span> 
                                    <input type="text" class="form-control1 icon" name="operating_hours" placeholder=""> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="operating_hours" class="col-sm-3 control-label">Extra Info.</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-pencil"></i></span> 
                                    <input type="text" class="form-control1 icon" name="extra_info" /> 
                                  </div>  
                                </div> 
                              </div>
                              
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                        <h3 class="w3_inner_tittle two">Description & Meta Tags </h3>
                        <div class="grid-1">
                            <div class="form-body">
                                <div class="form-group">
                                    <textarea class="form-control1" name="description" id="description"></textarea>
                                </div>
                                
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Meta Title</label>
                                <div class="col-sm-9">
                                  <input type="text" required="true" class="form-control1" placeholder="Meta Title" name="meta_title">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Meta Keyword</label>
                                <div class="col-sm-9">
                                  <input type="text" required="true" class="form-control1" placeholder="Meta Keyword" name="meta_keyword">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Meta Description</label>
                                <div class="col-sm-9">
                                  <input type="text" required="true" class="form-control1" placeholder="Meta Description" name="meta_description">
                                </div>
                              </div>


                            </div>
                        </div>
                    </div>
                  </div>
                        
                  <div class="row wthree_general graph-form agile_info_shadow ">
                      <h3 class="w3_inner_tittle two">More Information </h3>
                       <div class="grid-1 ">
                           <div class="form-body">
                              <div class="form-group">
                                <label for="tour_schedule" class="col-sm-2 control-label">Tour Schedule</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="tour_schedule" id="tour_schedule"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="tour_map" class="col-sm-2 control-label">Tour Map</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="tour_map" id="tour_map"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="tour_reviews" class="col-sm-2 control-label">Tour Reviews</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="tour_reviews" id="tour_reviews"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="pickup_information" class="col-sm-2 control-label">Pickup Information</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="pickup_information" id="pickup_information"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="cancellation_policy" class="col-sm-2 control-label">Cancellation Policy</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="cancellation_policy" id="cancellation_policy"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="frequently_asked_questions" class="col-sm-2 control-label">Frequently Asked Questions</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="frequently_asked_questions" id="frequently_asked_questions"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="other_information" class="col-sm-2 control-label">Other Information</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="other_information" id="other_information"></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">YouTube Link</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control1" name="youtube_link" placeholder="Youtube link">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="xola_code" class="col-sm-2 control-label">Xola Code</label>
                                <div class="col-sm-10">
                                  <input type="text" required="true" class="form-control1" name="xola_code" placeholder="xola code">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="banner_image" class="col-sm-2 control-label">Banner Image</label>
                                <div class="col-sm-10">
                                  <input class="form-control1" name="banner_image" id="banner_image" type="file"> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="tour_thumb" class="col-sm-2 control-label">Tour Thumb</label>
                                <div class="col-sm-10">
                                  <input class="form-control1" name="tour_thumb" id="tour_thumb" type="file"> 
                                </div>
                              </div>
  
                              <div class="form-group">
                                <label class="col-sm-2 control-label"> </label>
                                <div class="col-sm-8">
                                  <button type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
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
	$('.form-horizontal').valida();
});
</script>
<script type="text/javascript" src="js/validator.min.js"></script>
<script type="text/javascript" src="summernote/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#tour_schedule, #tour_map, #tour_reviews, #pickup_information, #cancellation_policy, #frequently_asked_questions, #other_information').summernote({
		height: 400,
		onImageUpload: function(files, editor, welEditable) {
			sendFile(files[0],editor,welEditable);
		}
  });
  $('#txtEditor, #add_ons').summernote({
		height: 270,
		onImageUpload: function(files, editor, welEditable) {
			sendFile(files[0],editor,welEditable);
		}
  });
  $('#description').summernote({
		height: 310,
		onImageUpload: function(files, editor, welEditable) {
			sendFile(files[0],editor,welEditable);
		}
  });
});

function sendFile(file, editor, welEditable) {
	data = new FormData();
	data.append("file", file);
	$.ajax({
		data: data,
		type: "POST",
		url: "<?php echo ('ajax/uploadImage'); ?>",
		cache: false,
		contentType: false,
		processData: false,
		success: function(url) {
			editor.insertImage(welEditable, url);
		}
	});
}
</script>
</body>
</html>