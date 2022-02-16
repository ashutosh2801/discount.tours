<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$model = array();
if(isset($_POST['title'])) {

	extract($_POST);
	$slug = $slug ? $slug : $title;
	$slug = urlMap($slug);
	
	$sql2='';
	
	if($_FILES['banner_image']['name']) {
		$target_dir 	= "../uploads/tours/";
		$extension 		= strtolower(pathinfo($_FILES["banner_image"]["name"],PATHINFO_EXTENSION));
		$banner_image = date('Ymdhis')."_".rand(100,999).".$extension";
		$target_file 	= $target_dir . $banner_image;
		move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file);
		$sql2.= "`banner_image`='".addslashes($banner_image)."',";
	}
	
	if($_FILES['tour_thumb']['name']) {
		$target_dir 	= "../uploads/tours/thumb/";
		$extension 		= strtolower(pathinfo($_FILES["tour_thumb"]["name"],PATHINFO_EXTENSION));
		$tour_thumb = date('Ymdhis')."_".rand(100,999).".$extension";
		$target_file 	= $target_dir . $tour_thumb;
		move_uploaded_file($_FILES["tour_thumb"]["tmp_name"], $target_file);
		$sql2.= "`tour_thumb`='".addslashes($tour_thumb)."',";
	}
	
	$category = is_array($_POST['category']) ? implode(",",$_POST['category']) : '';
	$tour_types = is_array($_POST['tour_types']) ? implode(",",$_POST['tour_types']) : '';
	$add_ons_ids = is_array($_POST['addons_ids']) ? implode(",",$_POST['addons_ids']) : '';
	
	if($price_type=='person') {
		$max_people = 0;
	}
	else if($price_type=='group') {
		$max_people = $max_people;
		$adults_label = $adults_label1;
		$adults_price = $adults_price1;
		$adults_text = $adults_text1;
	}
	
	$status = $status ? 1 : 0; 
	
	$sql = "UPDATE `tour_tours` SET 
			`category`='$category', 
			`tour_types`='$tour_types', 
			`title`='$title', 
			`slug`='$slug', 
			`sub_title`='$sub_title', 
			`meta_title`='".addslashes($meta_title)."', 
			`meta_keyword`='".addslashes($meta_keyword)."', 
			`meta_description`='".addslashes($meta_description)."', 
			`description`='".addslashes($description)."', 
			`location`='".addslashes($location)."', 
			`duration`='".addslashes($duration)."', 
			`operating_hours`='".addslashes($operating_hours)."', 
			`extra_info`='".addslashes($extra_info)."', 
			`no_reviews`='".addslashes($no_reviews)."', 
			`currency`='".addslashes($currency)."', 
			`country`='".addslashes($country)."', 
			`tag_class`='".addslashes($tag_class)."', 
			`tag_type`='".addslashes($tag_type)."', 
			`original_price`='".addslashes($original_price)."', 
			`adults_label`='".addslashes($adults_label)."', 
			`adults_price`='".addslashes($adults_price)."', 
			`adults_text`='".addslashes($adults_text)."', 
			`seniors_label`='".addslashes($seniors_label)."', 
			`seniors_price`='".addslashes($seniors_price)."', 
			`seniors_text`='".addslashes($seniors_text)."', 
			`children_label`='".addslashes($children_label)."', 
			`children_price`='".addslashes($children_price)."', 
			`children_text`='".addslashes($children_text)."', 
			`infants_label`='".addslashes($infants_label)."', 
			`infants_price`='".addslashes($infants_price)."', 
			`infants_text`='".addslashes($infants_text)."', 
			`tour_schedule`='".addslashes($tour_schedule)."', 
			`tour_map`='".addslashes($tour_map)."', 
			`tour_reviews`='".addslashes($tour_reviews)."', 
			`tour_inclusions`='".addslashes($tour_inclusions)."', 
			`add_ons`='".addslashes($add_ons)."', 
			`add_ons_ids`='".$add_ons_ids."', 
			`price_type`='".$price_type."', 
			`max_people`='".$max_people."', 
			`convenience_fee`='".$convenience_fee."', 
			`cut_off_time`='".$cut_off_time."', 
			`pickup_information`='".addslashes($pickup_information)."', 
			`cancellation_policy`='".addslashes($cancellation_policy)."', 
			`other_information` = '".addslashes($other_information)."',
			`frequently_asked_questions`='".addslashes($frequently_asked_questions)."', ".$sql2." 
			`youtube_link`='".addslashes($youtube_link)."', 
			`gratuity`='".($gratuity)."', 
			`tax_allow`='".($tax_allow)."', 
			`date_allow`='".$date_allow."', 
			`time_slot`='".$time_slot."', 
			`today_allow`='".$today_allow."', 
			`attend_allow`='".$attend_allow."', 
			`safe_private_tours`='".$safe_private_tours."', 
			`free_cancellaton`='".$free_cancellaton."', 
			`travelers_choice`='".$travelers_choice."', 
			`customer_rated`='".$customer_rated."', 
			`is_tour_map`='".$is_tour_map."', 
			`allow_pickup_location`='".($allow_pickup_location)."', 
			`status`='".($status)."', 
			`xola_code`='".addslashes($xola_code)."' WHERE ID=".$_GET['id'].";";
	try {
		
		//echo $sql; exit;
		if ($conn->query($sql) === TRUE) {
			$_SESSION['msg'] = 'Record Saved!';
			header('Location: update_tour.php?id='.$_GET['id']);
			exit;
		}
	}
	catch(Exception $e){
		print_r($e); exit;
	}
}

$sql = "SELECT * FROM tour_tours WHERE ID=".$_GET['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$model = $result->fetch_object();
	//echo '<pre>'; print_r($model); exit; 
} else {
	$msg = 'Invalid ID!';
	header('Location: error.php?msg='.$msg);
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Tour :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
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
                <li><a href="tours.php">Tours</a><span>«</span></li>
                <li>Update</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
          <div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					  <button style="float:right" type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
            <h2 class="w3_inner_tittle">Update [<?php echo $model->title; ?>]</h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
                  
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Title & Types </h3>
                      <div class="grid-1">
                          <div class="form-body">
                  					
                            <div class="form-group">
                              <label for="checkbox" class="col-sm-3 control-label">Add Ons</label>
                              <div class="col-sm-9">
                              	<div class="row">
                                	<?php $add_ons = explode(",",$model->add_ons_ids); ?>
                                  <?php
																	$sql2 = "SELECT * FROM tour_add_ons ORDER BY `addons_id` ASC";
																	$result2 = $conn->query($sql2);
																	if ($result2->num_rows > 0) {
																			while($row2 = $result2->fetch_object()) {
																	?>
                  
                                  <div class="col-sm-12">
                                  	<label><input <?php if(in_array($row2->addons_id,$add_ons)) echo 'checked'; ?> type="checkbox" name="addons_ids[]" value="<?php echo $row2->addons_id; ?>"> <?php echo $row2->addons_title; ?> (CA$<?php echo $row2->addons_price; ?>)</label>
                                  </div>
                                  
                                  <?php }} ?>
                                  
                              </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="checkbox" class="col-sm-3 control-label">Category</label>
                              <div class="col-sm-8">
																<?php $category = explode(",",$model->category); ?>
                              	<?php
																$sql3 = "SELECT * FROM tour_category ORDER BY `cat_id` ASC";
																$result3 = $conn->query($sql3);
																if ($result3->num_rows > 0) {
																		while($row3 = $result3->fetch_object()) {
																?>
																<div class="col-sm-6">
																	<label><input <?php if(in_array($row3->cat_slug,$category)) echo 'checked'; ?> type="checkbox" name="category[]" value="<?php echo $row3->cat_slug; ?>"> <?php echo $row3->cat_name; ?></label>
																</div>
																<?php } } ?>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="checkbox" class="col-sm-3 control-label">Tour Types</label>
                              <div class="col-sm-8">
                              	<div class="row">
                                <?php $tour_types = explode(",",$model->tour_types); ?>
                                <div class="col-sm-6">
                                <label><input <?php if(in_array('Family Tours',$tour_types)) echo 'checked'; ?> type="checkbox" name="tour_types[]" value="Family Tours"> Family Tours</label>
                                </div>
                                <div class="col-sm-6">
                                <label><input <?php if(in_array('History & Culture',$tour_types)) echo 'checked'; ?> type="checkbox" name="tour_types[]" value="History & Culture"> History & Culture</label></div>
                                <div class="col-sm-6">
                                <label><input <?php if(in_array('Niagara Air Tours',$tour_types)) echo 'checked'; ?> type="checkbox" name="tour_types[]" value="Niagara Air Tours"> Niagara Air Tours</label></div>
                                <div class="col-sm-6">
                                <label><input <?php if(in_array('Sightseeing tours',$tour_types)) echo 'checked'; ?> type="checkbox" name="tour_types[]" value="Sightseeing tours"> Sightseeing tours</label>
                                </div>
                                <div class="col-sm-6">
                                <label><input <?php if(in_array('Wine Tours',$tour_types)) echo 'checked'; ?> type="checkbox" name="tour_types[]" value="Wine Tours"> Wine Tours</label></div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-3 control-label">Tour Title</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="title" placeholder="Tour Title" value="<?php echo $model->title; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="disabledinput" class="col-sm-3 control-label">Slug</label>
                              <div class="col-sm-8">
                                <input type="text" required="true" class="form-control1" name="slug" placeholder="Slug" value="<?php echo $model->slug; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword" class="col-sm-3 control-label">Sub Title</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" placeholder="Sub Title" name="sub_title" value="<?php echo $model->sub_title; ?>">
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>             
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                        <div class="grid-1">
                        	<div class="form-body">
                          	
                            <div class="form-group"> 
                              <div class="col-sm-4"> 
                                <label class="control-label">Tax Allow</label>
                                <select name="tax_allow" id="tax_allow" class="form-control1 icon">
                                  <option <?php if($model->tax_allow=='1') echo 'selected'; ?> value="1">Allow</option>
                                  <option <?php if($model->tax_allow=='0') echo 'selected'; ?> value="0">Disallow</option>
                                </select> 
                              </div>
                              <div class="col-sm-4"> 
                                <label class="control-label">Pickup Location</label> 
                                <select name="allow_pickup_location" id="allow_pickup_location" class="form-control1 icon">
                                  <option <?php if($model->allow_pickup_location=='1') echo 'selected'; ?> value="1">Allow</option>
                                  <option <?php if($model->allow_pickup_location=='0') echo 'selected'; ?> value="0">Disallow</option>
                                </select>  
                              </div>
                              <div class="col-sm-4"> 
                                <label class="control-label">Status</label> 
                                <select name="status" id="status" class="form-control1 icon">
                                  <option <?php if($model->status=='1') echo 'selected'; ?> value="1">Active</option>
                                  <option <?php if($model->status=='0') echo 'selected'; ?> value="0">Inactive</option>
                                </select>  
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-4">
                                <label class="control-label">Dates Allow <span style="cursor:pointer; color:#F00;" id="empty">Empty?</span></label> 
                                <input type="text" class="form-control1 icon" name="date_allow" id="date_allow" placeholder="Date range" autocomplete="off" value="<?php echo isset($_POST['date_allow']) ? $_POST['date_allow'] : $model->date_allow; ?>" />
                              </div>
                              <div class="col-md-4">
                                <label class="control-label">Time Slot</label>
                                <input type="text" class="form-control1 icon" name="time_slot" id="time_slot" placeholder="Time slot with comma seperate" autocomplete="off" value="<?php echo isset($_POST['time_slot']) ? $_POST['time_slot'] : $model->time_slot; ?>" />
                                <br><i style="font-size:12px">eg. 10:15 AM, 11:30 AM</i>  
                              </div>
                            	<div class="col-md-4">
                                <label class="control-label">Cut Off Time</label>
                                <select name="cut_off_time" id="cut_off_time" class="form-control1 icon">
                                  <option <?php if($model->cut_off_time=='') echo 'selected'; ?> value="">None</option>
                                  <option <?php if($model->cut_off_time=='1') echo 'selected'; ?> value="1">1 Day</option>
                                  <option <?php if($model->cut_off_time=='2') echo 'selected'; ?> value="2">2 Days</option>
                                  <option <?php if($model->cut_off_time=='3') echo 'selected'; ?> value="3">3 Days</option>
                                  <option <?php if($model->cut_off_time=='4') echo 'selected'; ?> value="4">4 Days</option>
                                  <option <?php if($model->cut_off_time=='5') echo 'selected'; ?> value="5">5 Days</option>
                                  <option <?php if($model->cut_off_time=='6') echo 'selected'; ?> value="6">6 Days</option>
                                  <option <?php if($model->cut_off_time=='7') echo 'selected'; ?> value="7">1 Week</option>
                                  <option <?php if($model->cut_off_time=='14') echo 'selected'; ?> value="14">2 Weeks</option>
                                </select>  
                              </div>
                            </div>
                            
                            <div><i>Note:- Date Today Allow - Work only if (Dates Allow/Cut Off Time) not set.</i></div>
                            
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Date Today Allow</label><br>
                                <input type="checkbox" name="today_allow" id="today_allow" value="1" <?php echo $model->today_allow?'checked':''; ?> style="width:30px; height:30px" />  
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">All Guest Names</label><br>
                                <input type="checkbox" name="attend_allow" id="attend_allow" value="1" <?php echo $model->attend_allow?'checked':''; ?> style="width:30px; height:30px" />  
                              </div>
                            </div>
                            
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Gratuity </label>
                                <div class="input-group">
                                	<input type="text" class="form-control1 icon" name="gratuity" id="gratuity" placeholder="eg. 15%" autocomplete="off" value="<?php echo isset($_POST['gratuity']) ? $_POST['gratuity'] : $model->gratuity; ?>" />
                                  <span class="input-group-addon">%</span> 
                                </div>  
                              </div>
                            </div>
                          
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Convenience Fee </label>
                                <div class="input-group">
                                  <span class="input-group-addon">$</span> 
                                	<input type="text" class="form-control1 icon" name="convenience_fee" id="convenience_fee" placeholder="20.10" autocomplete="off" value="<?php echo isset($_POST['convenience_fee']) ? $_POST['convenience_fee'] : $model->convenience_fee; ?>" />
                                </div>  
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Safe & Private</label><br>
                                <input type="checkbox" name="safe_private_tours" id="safe_private_tours" value="1" <?php echo $model->safe_private_tours?'checked':''; ?> style="width:30px; height:30px" />  
                              </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Free Cancellaton</label><br>
                                <input type="checkbox" name="free_cancellaton" id="free_cancellaton" value="1" <?php echo $model->free_cancellaton?'checked':''; ?> style="width:30px; height:30px" />  
                              </div></div>
                              <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">Travelers' Choice</label><br>
                                <input type="checkbox" name="travelers_choice" id="travelers_choice" value="1" <?php echo $model->travelers_choice?'checked':''; ?> style="width:30px; height:30px" />  
                              </div></div>
                              <div class="col-md-3">
                                <div class="form-group">
                                <label class="control-label">5-Star Rated</label><br>
                                <input type="checkbox" name="customer_rated" id="customer_rated" value="1" <?php echo $model->customer_rated?'checked':''; ?> style="width:30px; height:30px" />  
                              </div>
                            </div></div>
                            <div class="clearfix"></div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="control-label">Tour Map</label><br>
                                <input type="checkbox" name="is_tour_map" id="is_tour_map" value="1" <?php echo $model->is_tour_map?'checked':''; ?> style="width:30px; height:30px" />  
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                          	<div class="col-md-6">
                              <h3 class="w3_inner_tittle two">Tour Inclusions</h3>
                              <div class="form-group"> 
                                  <textarea class="form-control1" name="tour_inclusions" id="txtEditor"><?php echo $model->tour_inclusions; ?></textarea> 
                              </div> 
                            </div>
                            <div class="col-md-6">  
                              <h3 class="w3_inner_tittle two">Add-Ons</h3>
                              <div class="form-group"> 
                                  <textarea class="form-control1" name="add_ons" id="add_ons"><?php echo $model->add_ons; ?></textarea> 
                              </div> 
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
                                <label for="inputPassword3" class="col-sm-3 control-label">Price type</label>
                                <div class="col-sm-5"> 
                                  <select name="price_type" id="price_type" class="form-control1 icon">
                                  	<option <?php if($model->price_type=='person') echo 'selected'; ?> value="person">Per person</option>
                                  	<option <?php if($model->price_type=='group') echo 'selected'; ?> value="group">Per group</option>
                                  </select> 
                                </div> 
                                <div class="col-sm-4"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="max_people" placeholder="e.g. 1000" value="<?php echo $model->max_people; ?>"> 
                                  </div>  
                                </div>
                                
                                <?php /*?><div class="col-sm-3"> 
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input required="true" type="text" class="form-control1 icon" name="original_price" placeholder="Orginal Price" value="<?php echo $model->original_price; ?>"> 
                                  </div>  
                                </div><?php */?>
                              </div>
                              
                              <div class="form-group"> 
                               <label for="inputPassword3" class="col-sm-3 control-label">Original Price</label>
                                <div class="col-sm-2"> 
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input type="text" class="form-control1 icon" name="original_price" placeholder="Orginal Price" value="<?php echo $model->original_price; ?>"> 
                                  </div>  
                                </div>
                                <label for="inputPassword3" class="col-sm-2 control-label">Tag</label>
                                <div class="col-sm-2"> 
                                  <select name="tag_class" id="tag_class" class="form-control1 icon">
                                  	<option <?php if($model->tag_class=='') echo 'selected'; ?> value="">Tag Class</option>
                                    <option <?php if($model->tag_class=='onsale') echo 'selected'; ?> value="onsale">Yellow</option>
                                  	<option <?php if($model->tag_class=='bestseller') echo 'selected'; ?> value="bestseller">Green</option>
                                  	<option <?php if($model->tag_class=='special_offer') echo 'selected'; ?> value="special_offer">Pink</option>
                                  	<option <?php if($model->tag_class=='limited_offer') echo 'selected'; ?> value="limited_offer">Red</option>
                                  </select> 
                                </div>
                                <div class="col-sm-3"> 
                                		
                                  <select name="tag_type" id="tag_type" class="form-control1 icon">
                                  	<option <?php if($model->tag_type=='') echo 'selected'; ?> value="">Tag Name</option>
                                    <option <?php if($model->tag_type=='Likely to sell out') echo 'selected'; ?> value="Likely to sell out">Likely to sell out</option>
                                  	<option <?php if($model->tag_type=="<i class='fa fa-calendar'></i> Book In Advance") echo 'selected'; ?> value="<i class='fa fa-calendar'></i> Book In Advance">Book In Advance</option>
                                    <option <?php if($model->tag_type=="<i class='fa fa-trophy'></i> Bestseller") echo 'selected'; ?> value="<i class='fa fa-trophy'></i> Bestseller">Bestseller</option>
                                    <option <?php if($model->tag_type=="<i class='fa fa-tags'></i> On Sale") echo 'selected'; ?> value="<i class='fa fa-tags'></i> On Sale">On Sale</option>
                                    <option <?php if($model->tag_type=="<i class='fa fa-tags'></i> Special Offer") echo 'selected'; ?> value="<i class='fa fa-tags'></i> Special Offer">Special Offer</option>
                                    <option <?php if($model->tag_type=="<i class='fa fa-tags'></i> Limited Time Offer") echo 'selected'; ?> value="<i class='fa fa-tags'></i> Limited Time Offer">Limited Time Offer</option>
                                  </select>
                                  
                                    <?php /*?><input type="text" class="form-control1 icon" name="tag_type" placeholder="Tag" value="<?php echo $model->tag_type; ?>"><?php */?> 
                                </div>
                                
                              </div>
                              
                              <div id="person" style="display:<?=($model->price_type=='person')?'block':'none'; ?>">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Adults price</label> 
                                  <div class="col-sm-3"> 
                                    <input required="true" type="text" class="form-control1 icon" name="adults_label" placeholder="Adults label" value="<?php echo $model->adults_label; ?>"> 
                                  </div>
                                  <div class="col-sm-3"> 
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input required="true" type="text" class="form-control1 icon" name="adults_price" placeholder="Adults price" value="<?php echo $model->adults_price; ?>">
                                  </div>  
                                  </div> 
                                  <div class="col-sm-3"> 
                                    <input type="text" class="form-control1 icon" name="adults_text" placeholder="Adults text" value="<?php echo $model->adults_text; ?>"> 
                                  </div>
                                </div>
                                 
                                <div class="form-group"> 
                                  <label for="inputPassword3" class="col-sm-3 control-label">Seniors price</label>
                                  <div class="col-sm-3"> 
                                    <input required="true" type="text" class="form-control1 icon" name="seniors_label" placeholder="Seniors label" value="<?php echo $model->seniors_label; ?>"> 
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <span class="input-group-addon">$</span> 
                                      <input required="true" type="text" class="form-control1 icon" name="seniors_price" placeholder="Seniors price" value="<?php echo $model->seniors_price; ?>">
                                    </div>   
                                  </div> 
                                  <div class="col-sm-3"> 
                                    <input type="text" class="form-control1 icon" name="seniors_text" placeholder="Seniors text" value="<?php echo $model->seniors_text; ?>"> 
                                  </div>
                                </div>
                                
                                <div class="form-group"> 
                                  <label for="inputPassword3" class="col-sm-3 control-label">Children price</label>
                                  <div class="col-sm-3"> 
                                    <input required="true" type="text" class="form-control1 icon" name="children_label" placeholder="Children label" value="<?php echo $model->children_label; ?>"> 
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <span class="input-group-addon">$</span> 
                                      <input required="true" type="text" class="form-control1 icon" name="children_price" placeholder="Children price" value="<?php echo $model->children_price; ?>">
                                    </div>   
                                  </div>
                                  <div class="col-sm-3"> 
                                    <input type="text" class="form-control1 icon" name="children_text" placeholder="Children text" value="<?php echo $model->children_text; ?>"> 
                                  </div> 
                                </div>
                                
                                <div class="form-group"> 
                                  <label for="inputPassword3" class="col-sm-3 control-label">Infants price</label>
                                  <div class="col-sm-3"> 
                                    <input required="true" type="text" class="form-control1 icon" name="infants_label" placeholder="Infants label" value="<?php echo $model->infants_label; ?>"> 
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="input-group">
                                      <span class="input-group-addon">$</span> 
                                      <input required="true" type="text" class="form-control1 icon" name="infants_price" placeholder="Infants price" value="<?php echo $model->infants_price; ?>"> 
                                    </div>  
                                  </div>
                                  <div class="col-sm-3"> 
                                    <input type="text" class="form-control1 icon" name="infants_text" placeholder="Infants text" value="<?php echo $model->infants_text; ?>"> 
                                  </div> 
                                </div>
                              </div>
                              
                              <div id="group" style="display:<?=($model->price_type=='group')?'block':'none'; ?>">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Group price</label> 
                                  <div class="col-sm-3"> 
                                    <input required="true" type="text" class="form-control1 icon" name="adults_label1" placeholder="Group label" value="<?php echo $model->adults_label; ?>"> 
                                  </div>
                                  <div class="col-sm-3"> 
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span> 
                                    <input required="true" type="text" class="form-control1 icon" name="adults_price1" placeholder="Group price" value="<?php echo $model->adults_price; ?>">
                                  </div>  
                                  </div> 
                                  <div class="col-sm-3"> 
                                    <input type="text" class="form-control1 icon" name="adults_text1" placeholder="Group text" value="<?php echo $model->adults_text; ?>"> 
                                  </div>
                                </div>
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Currency & Country</label>
                                <div class="col-sm-4"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-language"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="currency" placeholder="Currency" value="<?php echo $model->currency; ?>"> 
                                  </div>  
                                </div>
                                <div class="col-sm-5"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="country" placeholder="Country" value="<?php echo $model->country; ?>"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Location</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="location" placeholder="Location" value="<?php echo $model->location; ?>"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">Duration</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-clock-o"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="duration" placeholder="Duration" value="<?php echo $model->duration; ?>"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-3 control-label">No. of reviews</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span> 
                                    <input required="true" type="text" class="form-control1 icon" name="no_reviews" placeholder="No. of reviews" value="<?php echo $model->no_reviews; ?>"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="operating_hours" class="col-sm-3 control-label">Operating Hours</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-clock-o"></i></span> 
                                    <input type="text" class="form-control1 icon" name="operating_hours" placeholder="Operating Hours" value="<?php echo $model->operating_hours; ?>"> 
                                  </div>  
                                </div> 
                              </div>
                              
                              <div class="form-group"> 
                                <label for="operating_hours" class="col-sm-3 control-label">Extra Info.</label>
                                <div class="col-sm-9"> 
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa fa-pencil"></i></span> 
                                    <input type="text" class="form-control1 icon" name="extra_info" value="<?php echo $model->extra_info; ?>" /> 
                                  </div>  
                                </div> 
                              </div>
                              
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Meta Tags & Description </h3>
                      <div class="grid-1">
                          <div class="form-body">
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Meta Title</label>
                                <div class="col-sm-9">
                                  <input type="text" required="true" class="form-control1" placeholder="Meta Title" name="meta_title" value="<?php echo $model->meta_title; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Meta Keyword</label>
                                <div class="col-sm-9">
                                  <input type="text" required="true" class="form-control1" placeholder="Meta Keyword" name="meta_keyword" value="<?php echo $model->meta_keyword; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-3 control-label">Meta Description</label>
                                <div class="col-sm-9">
                                  <input type="text" required="true" class="form-control1" placeholder="Meta Description" name="meta_description" value="<?php echo $model->meta_description; ?>">
                                </div>
                              </div> 
                              <div class="form-group"> 
                                  <textarea class="form-control1" name="description" id="description"><?php echo $model->description; ?></textarea>
                              </div>   
                         </div>
                      </div>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                  
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Pickup Information</h3>
                      <div class="grid-1">
                        <div class="form-body">
                          <div class="form-group">
                              <textarea class="form-control1" name="pickup_information" id="pickup_information"><?php echo $model->pickup_information; ?></textarea> 
                          </div>
                        </div>
                      </div>    
                    </div>
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Cancellation Policy</h3>
                      <div class="grid-1">
                      <div class="form-body">
                        <div class="form-group">
                            <textarea class="form-control1" name="cancellation_policy" id="cancellation_policy"><?php echo $model->cancellation_policy; ?></textarea>  
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Frequently Asked Questions</h3>
                      <div class="grid-1">
                        <div class="form-body">
                          <div class="form-group">
                              <textarea class="form-control1" name="frequently_asked_questions" id="frequently_asked_questions"><?php echo $model->frequently_asked_questions; ?></textarea>
                          </div>
                        </div>
                      </div>    
                    </div>
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Other Information</h3>
                      <div class="grid-1">
                      <div class="form-body">
                        <div class="form-group">
                            <textarea class="form-control1" name="other_information" id="other_information"><?php echo $model->other_information; ?></textarea> 
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">YouTube Link</h3>
                      <div class="grid-1">
                        <div class="form-body">
                          <div class="form-group">
                              <input type="text" class="form-control1" name="youtube_link" placeholder="Youtube link" value="<?php echo $model->youtube_link; ?>">
                          </div>
                        </div>
                      </div>    
                    </div>
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Xola Code</h3>
                      <div class="grid-1">
                      <div class="form-body">
                        <div class="form-group">
                            <input type="text" required="true" class="form-control1" name="xola_code" placeholder="xola code" value="<?php echo $model->xola_code; ?>">
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                        
                  <div class="row set-1_w3ls">
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Banner Image</h3>
                      <div class="grid-1">
                        <div class="form-body">
                          <div class="form-group">
                              <input class="form-control1" name="banner_image" id="banner_image" type="file"> 
                              <?php 
															if(file_exists("../uploads/tours/".$model->banner_image)) {
																?><br />
																<img src="<?php echo "../uploads/tours/".$model->banner_image; ?>" alt="<?php echo $model->banner_image; ?>" class="img-responsive" />
																<?php
															}
															?>
                          </div>
                        </div>
                      </div>    
                    </div>
                    <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                      <h3 class="w3_inner_tittle two">Tour Thumb</h3>
                      <div class="grid-1">
                      <div class="form-body">
                        <div class="form-group">
                            <input class="form-control1" name="tour_thumb" id="tour_thumb" type="file">
                            <?php 
														if(file_exists("../uploads/tours/thumb/".$model->tour_thumb)) {
															?><br />
															<img src="<?php echo "../uploads/tours/thumb/".$model->tour_thumb; ?>" alt="<?php echo $model->tour_thumb; ?>" class="img-responsive" />
															<?php
														}
														?>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  
									<div class="form-group">
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                    </div>
                  </div>
                        
                  <?php /*?><div class="row wthree_general graph-form agile_info_shadow ">
                  		<h3 class="w3_inner_tittle two">More Information </h3>
                       <div class="grid-1 ">
                           <div class="form-body">
                              <div class="form-group">
                                <label for="tour_schedule" class="col-sm-2 control-label">Tour Schedule</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="tour_schedule" id="tour_schedule"><?php echo $model->tour_schedule; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="tour_map" class="col-sm-2 control-label">Tour Map</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="tour_map" id="tour_map"><?php echo $model->tour_map; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="tour_reviews" class="col-sm-2 control-label">Tour Reviews</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="tour_reviews" id="tour_reviews"><?php echo $model->tour_reviews; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="pickup_information" class="col-sm-2 control-label">Pickup Information</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="pickup_information" id="pickup_information"><?php echo $model->pickup_information; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="cancellation_policy" class="col-sm-2 control-label">Cancellation Policy</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="cancellation_policy" id="cancellation_policy"><?php echo $model->cancellation_policy; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="frequently_asked_questions" class="col-sm-2 control-label">Frequently Asked Questions</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="frequently_asked_questions" id="frequently_asked_questions"><?php echo $model->frequently_asked_questions; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="other_information" class="col-sm-2 control-label">Other Information</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control1" name="other_information" id="other_information"><?php echo $model->other_information; ?></textarea> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">YouTube Link</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control1" name="youtube_link" placeholder="Youtube link" value="<?php echo $model->youtube_link; ?>">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="xola_code" class="col-sm-2 control-label">Xola Code</label>
                                <div class="col-sm-10">
                                  <input type="text" required="true" class="form-control1" name="xola_code" placeholder="xola code" value="<?php echo $model->xola_code; ?>">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="banner_image" class="col-sm-2 control-label">Banner Image</label>
                                <div class="col-sm-10">
                                  <input class="form-control1" name="banner_image" id="banner_image" type="file"> 
                                  <?php 
																	if(file_exists("../uploads/tours/".$model->banner_image)) {
																		?><br />
																		<img src="<?php echo "../uploads/tours/".$model->banner_image; ?>" alt="<?php echo $model->banner_image; ?>" class="img-responsive" />
																		<?php
																	}
																	?>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="tour_thumb" class="col-sm-2 control-label">Tour Thumb</label>
                                <div class="col-sm-10">
                                  <input class="form-control1" name="tour_thumb" id="tour_thumb" type="file"> 
                                  <?php 
																	if(file_exists("../uploads/tours/thumb/".$model->tour_thumb)) {
																		?><br />
																		<img src="<?php echo "../uploads/tours/thumb/".$model->tour_thumb; ?>" alt="<?php echo $model->tour_thumb; ?>" class="img-responsive" />
																		<?php
																	}
																	?>
                                </div>
                              </div>
  
                              <div class="form-group">
                                <label class="col-sm-2 control-label"> </label>
                                <div class="col-sm-8">
                                  <button type="submit" name="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                                </div>
                              </div>
                            </div>
                       </div>
                  </div><?php */?>          
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
	
	$('#date_allow').daterangepicker({
		locale: {
      format: 'YYYY-MM-DD'
    }
	});
	$('#empty').click(function(){
		$('#date_allow').val('');
	});
	
	<?php if(empty($model->date_allow)) { ?>$('#date_allow').val('');<?php } ?>
});
</script>
<script type="text/javascript" src="js/validator.min.js"></script>
<script type="text/javascript" src="summernote/summernote.js"></script>
<script type="text/javascript">
$(function() {
	$('#price_type').change(function(){
		$('#person,#group').hide();
		$( '#'+ $(this).val() ).show();
	});
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