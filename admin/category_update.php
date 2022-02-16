<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if( isset($_POST['cat_name']) ) {
	
	extract($_POST);
	
	$cat_name = addslashes($cat_name);
	$cat_slug = urlMap(addslashes($cat_slug));
	
	$sql2='';
	if($_FILES['cat_banner']['name']) {
		$target_dir 	= "../uploads/category/";
		$extension 		= strtolower(pathinfo($_FILES["cat_banner"]["name"],PATHINFO_EXTENSION));
		$banner_image = date('Ymdhis')."_".rand(100,999).".$extension";
		$target_file 	= $target_dir . $banner_image;
		move_uploaded_file($_FILES["cat_banner"]["tmp_name"], $target_file);
		$sql2.= "`cat_banner`='".addslashes($banner_image)."',";
	}
	
	$sql = "UPDATE `".PREFIX."category` SET 
																				`is_menu`='".$is_menu."', 
																				`cat_name`='".addslashes($cat_name)."', 
																				`cat_title`='".addslashes($cat_title)."', 
																				`cat_slug`='".$cat_slug."', 
																				`cat_status`='".$cat_status."', 
																				`cat_sub_title`='".addslashes($cat_sub_title)."', 
																				`cat_count`='".$cat_count."', 
																				`cat_content`='".addslashes($cat_content)."', 
																				`meta_title`='".addslashes($meta_title)."',	
																				`meta_keyword`='".addslashes($meta_keyword)."', 
																				$sql2
																				`meta_description`='".addslashes($meta_description)."' 
																				WHERE `cat_id` = ".$_GET['id'].";";	
	if ($conn->query($sql) === TRUE) {
		
		for($i=0; $i<count($_POST['tours']); $i++) {
			$sql2 = "UPDATE `".PREFIX."tours` SET `category`=CONCAT(category, ',$cat_slug') WHERE `ID` = ".$_POST['tours'][$i].";";
			//echo  '<br>';
			$conn->query($sql2);	
		}
		//exit;
		
		$_SESSION['msg'] = 'Record Saved!';
		header('Location: category_update.php?id='.$_GET['id']);
		exit;
	}
}

$sql = "SELECT * FROM ".PREFIX."category WHERE cat_id=".$_GET['id'];
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
<title>Update Category :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link href="summernote/summernote.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
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
                <li>Update</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            
					  <h2 class="w3_inner_tittle">Update</h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
              <div class="row set-1_w3ls">
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                  <h3 class="w3_inner_tittle two">Title</h3>
                  <div class="grid-1">
                      <div class="form-body">

                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Is Menu?</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="radio" required="true" name="is_menu" <?php if($model->is_menu) echo 'checked'; ?> id="is_menu_1" value="1" /> Yes <input type="radio" required="true" name="is_menu" <?php if($model->is_menu==0) echo 'checked'; ?> id="is_menu_0" value="0" /> No
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Category Title</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="text" required="true" class="form-control1" name="cat_title" id="cat_title" placeholder="Category Title"  value="<?php echo $model->cat_title; ?>" >
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Category Sub Title</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="text" required="true" class="form-control1" name="cat_sub_title" id="cat_sub_title" placeholder="Category Sub Title"  value="<?php echo $model->cat_sub_title; ?>" />
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Category Name</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="text" required="true" class="form-control1" name="cat_name" id="cat_name" placeholder="Category Name" value="<?php echo $model->cat_name; ?>" />
                          </div>
                        </div>
                        
                        <div class="form-group"> 
                           <label class="col-sm-3 col-xs-12 control-label">Category Slug</label>
                           <div class="col-sm-9 col-xs-12">    
                              <input type="text" required="true" class="form-control1" name="cat_slug" id="cat_slug" placeholder="Username" value="<?php echo $model->cat_slug; ?>" />
                              <i><a target="_blank" href="https://www.toniagara.com/niagara-falls-<?php echo $model->cat_slug; ?>">https://www.toniagara.com/niagara-falls-<?php echo $model->cat_slug; ?></a></i> 
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="inputPassword" class="col-sm-3 control-label">Banner</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control1" name="cat_banner" id="cat_banner" />
                            <?php if(is_file($_SERVER['DOCUMENT_ROOT'].'/uploads/category/'.$model->cat_banner)) { ?>
                            <img src="<?php echo '/uploads/category/'.$model->cat_banner; ?>" class="img-responsive" />
                            <?php } ?>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label">Status</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <select required="true" name="cat_status" id="cat_status" class="form-control1">
                              <option <?php if($model->cat_status=='1') echo 'selected'; ?> value="1">Active</option>
                              <option <?php if($model->cat_status=='0') echo 'selected'; ?> value="0">Inactive</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="inputPassword" class="col-sm-3 control-label">Content</label>
                          <div class="col-sm-9">
                            <textarea class="form-control1" style="min-height:250px" name="cat_content" id="cat_content" placeholder="Content"><?php echo $model->cat_content; ?></textarea>
                          </div>
                        </div>
                        
                        <h3 class="w3_inner_tittle two">Meta Tags</h3>
                        
                        <div class="form-group">
                        	<div class="col-sm-6">
                        		{{TOTAL_VIEWS}} - Total view this category<br />
                        		{{CAT_NAME}} - Category Name<br />
                        		{{TOTAL_TOUR}} - Total tour this category<br />
                          </div>
                          <div class="col-sm-6">
                        		{{DATE}} - Current date<br />
                        		{{YEAR}} - Current year<br />
                        		<?php /*?>{{TOTAL_TOUR}} - Total view this category<br /><?php */?>
                          </div>
                        </div>
                        
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
                            <textarea name="meta_description" id="meta_description" placeholder="Meta Description"><?php echo $model->meta_description; ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-sm-3 col-xs-12 control-label"> </label>
                          <div class="col-sm-9 col-xs-12 ">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Update</button>
                          </div>  
                        </div>
                        
                        </div>
                    </div>
                </div> 
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                  <h3 class="w3_inner_tittle two">Tours</h3>
                  
                  <div class="grid-1">
                      <div class="form-body">
                      	<div class="form-group">
                            <?php
														$sql = "SELECT ID, title, sub_title, category FROM tour_tours ORDER BY `order` ASC LIMIT 0, 100";
														$result = $conn->query($sql);
														if ($result->num_rows > 0) {
															while($row = $result->fetch_object()) {
																$category = explode(",",$row->category);
														?>	
														<label style="border-bottom:1px solid #ccc; padding-bottom:5px; display:block;"><input type="checkbox" name="tours[]" <?php if(in_array($model->cat_name, $category) || in_array($model->cat_slug, $category)) echo 'checked'; ?> value="<?php echo $row->ID; ?>" style="width:15px; height:15px;">
														<?php echo $row->title; ?> <?php echo $row->sub_title; ?></label>
                            <?php }} ?>
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
  $('#cat_content').summernote({
		height: 300,
  });
});
</script>
</body>
</html>