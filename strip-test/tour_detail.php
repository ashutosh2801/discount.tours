<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');

$detect = new Mobile_Detect;

if(!empty($_GET['slug']))
{
	$sql = "SELECT * FROM tour_tours WHERE status=1 AND slug='".addslashes($_GET['slug'])."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$tour = $result->fetch_object();
		
		$tour_count = $tour->tour_count + 1;
		$sql2 = "UPDATE `tour_tours` SET `tour_count`='$tour_count' WHERE ID=".$tour->ID.";";
		$conn->query($sql2);
	} else {
		header('Location: /error');
		exit;
	}
} 
else {
	header('Location: /tours');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="<?=tour_urlMap('tours', $tour->slug);?>" />
<meta name="description" content="<?php echo $tour->meta_description; ?> Updated <?php echo date('Y-m-d'); ?>"/>
<meta name="keywords" content="<?php echo $tour->meta_keyword; ?>"/>
<title><?php echo $tour->meta_title; ?></title>
<?php $title = strip_tags($tour->title." ".$tour->sub_title); ?>
<?php $slug  = tour_urlMap('tours', $tour->slug); ?>
<?php $image = "https://www.toniagara.com/uploads/tours/".$tour->banner_image; ?>
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=$image;?>" />
<meta property="og:site_name" content="<?=SITENAME;?>" />
<meta property="og:title" content="<?=$title; ?>" />
<meta property="og:description" content="<?=$title; ?>" />
<meta property="og:url" content="<?=$slug; ?>" />
<meta property="twitter:site" content="toniagara.com" />
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:title" content="<?=$title; ?>" />
<meta property="twitter:image" content="<?=$image;?>" />
<meta name="twitter:description" content="<?=$title; ?>" />
<meta property="fb:pages" content="<?=SITENAME;?>" />
<meta property="og:image:url" content="<?=$image;?>" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:locale" content="en_IN" />
<meta property="twitter:image:width" content="1200" />
<meta property="twitter:image:height" content="630" />
<meta name="can-recommend" content="true" />
<link rel="canonical" href="<?=$slug; ?>">
<style>
@media (max-width: 767px) { .footer_wra2{padding-bottom: 65px!important;} }
</style>
<?php include 'inner_header.php';?>
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type" : "LocalBusiness",
	"name" : "<?php echo $title; ?>",
	"url" : "<?php echo $slug; ?>",
	"image" : "<?php echo $image; ?>",
	"aggregateRating" : {
		"@type" : "AggregateRating",
		"ratingValue" : "5",
		"bestRating" : "5",
		"worstRating": "0",
		"reviewCount" : "<?php echo $tour->no_reviews; ?>"
	},
	"address" : {
		"@type" : "PostalAddress",
		"streetAddress" : "5 Brisdale Drive, Suite 208", 
		"addressLocality" : "Brampton",
		"addressRegion" : "Ontario",
		"postalCode" : "L7A 0S9",
		"addressCountry" : {
		"@type" : "Country",
		"name" : "Canada"
	}
},
"priceRange": "<?php echo ($tour->children_price>0) ? $tour->currency."$".$tour->children_price." - "."$".$tour->adults_price : $tour->currency."$".$tour->adults_price; ?>",
"telephone": "+1 800-653-2242"
}
</script>
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type" : "TouristTrip",
	"name" : "<?php echo $title; ?>",
	"description" : "Location - <?php echo $tour->location; ?>
<?php if(!empty(trim($tour->duration))) { ?>
, Duration - <?php echo $tour->duration; ?>
<?php } ?>
<?php if($tour->adults_price>0) { ?>
<?php echo ", ".$tour->adults_label; ?> - <?php echo $tour->currency."$".$tour->adults_price." ".$tour->adults_text; ?>
<?php } if($tour->seniors_price>0) { ?>
<?php $label = strtolower($tour->seniors_label); ?>
<?php echo ", ".$tour->seniors_label; ?> - <?php echo $tour->currency."$".$tour->seniors_price." ".$tour->seniors_text; ?>
<?php } if($tour->children_price>0) { ?>
<?php $label = strtolower($tour->children_label); ?>
<?php echo ", ".$tour->children_label; ?> - <?php echo $tour->currency."$".$tour->children_price; ?>
<?php } else if(trim($tour->children_text)) { ?>
<?php echo ", ".$tour->children_label; ?> - <?php echo $tour->children_text; ?>
<?php } if($tour->infants_price>0) { ?>
<?php echo ", ".$tour->infants_label; ?> - <?php echo $tour->currency."$".$tour->infants_price; ?>
<?php } else if(trim($tour->infants_text)) { ?>
<?php echo ", ".$tour->infants_label; ?> - <?php echo $tour->infants_text; ?>
<?php } ?>
<?php if(trim($tour->operating_hours)) { ?>
, Operating Hours - <?php echo $tour->operating_hours; ?>
<?php } ?>",
	"image" : "<?php echo $image; ?>",
	"touristType": [
    "Sightseeing"
  ],
  "subjectOf": {
    "@type": "CreativeWork",
    "name": "<?php echo $tour->title; ?> Brochure",
    "url": "<?php echo "https://www.toniagara.com/uploads/brochure/".$tour->brochure; ?>"
  },
	"offers": {
    "@type": "Offer",
    "name": "<?php echo $tour->title; ?>",
    "price": "<?php echo "$".($tour->adults_price); ?>",
    "priceCurrency": "<?php echo $tour->currency; ?>",
		"availabilityEnds": "<?php echo date('Y-m-d', strtotime("+2 days")); ?>",
    "eligibleRegion": {
      "@type": "Country",
      "name": "CA"
    },
    "offeredBy": {
      "@type": "Organization",
      "name": "<?=SITENAME;?>",
      "url": "https://www.toniagara.com/"
    }
  },
	"itinerary": {
    "@type": "ItemList",
		<?php 
		$sql_101 = "SELECT * FROM tour_itinerary WHERE tour_id=".$tour->ID." AND status=1 ORDER BY `ID` ASC";
		$result_101 = $conn->query($sql_101);
		if ($result_101->num_rows > 0) {
			$i=1;
			?>
			"numberOfItems": <?=$result_101->num_rows;?>,
			"itemListElement": [
			<?php	
			while($row_101 = $result_101->fetch_object()) {
			?>
      {
				"@type": "ListItem",
        "position": <?=$i;?>,
        "item":
        {
          "@type": "TouristAttraction",
          "name": "<?php echo strip_tags($row_101->title); ?>",
          "description": "<?php echo strip_tags($row_101->description); ?>"
        }
			} <?php if($i++<$result_101->num_rows) echo ','; ?>
			<?php
			}
			?>
			]
			<?php
		}
		?>
  }
}
</script>
<!--banner-->
<div class="day_banner_wra" style="background: url(<?php echo tour_banner($tour->banner_image); ?>) 0 0 no-repeat; background-size: cover;">
<div class="detail_banner_shadow">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="banner_txt_l">
        <h3><?php echo $tour->location; ?></h3>
        <h2><?php echo $tour->title; ?> <span><?php echo $tour->sub_title; ?></span></h2>
        <div class="hour">
        <?php if(trim($tour->duration)) { ?><i class="fa fa-clock-o"></i> <?php echo $tour->duration; ?><?php } ?>  
        <i class="fa fa-comment-o"></i> <a href="#reviews" class="reviews_active"><?php echo $tour->no_reviews; ?> Reviews</a>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        </div>
        <div class="price2"><?php echo $tour->currency."$".($tour->adults_price); ?></div>
        
        <?php if($tour->country=='Canada') { ?>
        <div class="xola-checkout xola-custom" data-seller="591328906864eab4788b4593" data-experience="<?php echo $tour->xola_code; ?>" data-version="2"> Book This Tour <i class="fa fa-check" aria-hidden="true"></i> </div>
        <div class="xola-gift xola-custom gift" data-button-id="5915d65c332e75b91f8b461d"> Gift A Tour <i class="fa fa-check" aria-hidden="true"></i></div>
        <?php } else { ?>
        <a id="button-booking" class="rezdy rezdy-modal rezdy-custom" href="<?php echo $tour->xola_code; ?>">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
        <?php } ?>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
</div>
<!--end banner-->

<!--add ons-->
<div class="addon_row_wra">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
					<?php 
          $count = 2; 
          if(!empty(trim($tour->duration))) $count = $count + 1; 
          if($tour->adults_price>0) $count = $count + 1; 
          if($tour->seniors_price>0) $count = $count + 1; 
          if($tour->children_price>0) $count = $count + 1; 
          if($tour->infants_price>0) $count = $count + 1; 
          ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_icon tbl_icon<?=$count; ?>">
            <tr>
              <td>
                <img src="<?php echo IMAGEROOT; ?>location.png" alt="">
                Location<span><?php echo $tour->location; ?>  </span>
              </td>
              <td>
                <img src="<?php echo IMAGEROOT; ?>review.png" alt="review.png">
                Reviews <span><a href="#reviews" class="reviews_active"><?php echo $tour->no_reviews; ?> Reviews</a></span>
              </td>
              <?php if(!empty(trim($tour->duration))) { ?>
              <td>
                <img src="<?php echo IMAGEROOT; ?>time.png" alt="time.png">
                Duration<span><?php echo $tour->duration; ?>  </span>
              </td>
              <?php } ?>
              <?php if($tour->adults_price>0) { ?>
              <td <?php //if($tour->seniors_price==0 && $tour->children_price==0 && $tour->infants_price==0) echo 'colspan="3" class="center"'; ?>>
                <?php if($tour->adults_icon) $icon = $tour->adults_icon; else $icon = 'adult.png'; ?>
                <img src="/images/<?=$icon;?>" alt="adult.png">
                <?php echo $tour->adults_label; ?>
                <span><?php //if($tour->ID==8) { echo "<i>".$tour->currency."$".$tour->adults_price." ".$tour->adults_text."</i>"; } else { echo $tour->currency."$".$tour->adults_price." ".$tour->adults_text; } ?><?php  echo $tour->currency."$".$tour->adults_price." ".$tour->adults_text; ?></span>
              </td>
              <?php } if($tour->seniors_price>0) { ?>
              <td>
                <?php $label = strtolower($tour->seniors_label); ?>
                <?php $img = (strpos($label, 'people')!== false || strpos($label, 'person')!== false) ? 'adult.png' : 'senior.png'; ?>
                <img src="<?php echo IMAGEROOT; ?><?php echo $img; ?>" alt="<?php echo $img; ?>">
                <?php echo $tour->seniors_label; ?><span><?php echo $tour->currency."$".$tour->seniors_price." ".$tour->seniors_text; ?>  </span>
              </td>
              <?php } if($tour->children_price>0) { ?>
              <td>
                <?php $label = strtolower($tour->children_label); ?>
                <?php $img = (strpos($label, 'people')!== false || strpos($label, 'person')!== false) ? 'adult.png' : 'children.png'; ?>
                <img src="<?php echo IMAGEROOT; ?><?php echo $img; ?>" alt="<?php echo $img; ?>">
                <?php echo $tour->children_label; ?><span><?php echo $tour->currency."$".$tour->children_price; ?>  </span>
              </td>
              <?php } if($tour->infants_price>0) { ?>
              <td>
                <img src="<?php echo IMAGEROOT; ?>infants.png" alt="infants.png">
                <?php echo $tour->infants_label; ?><span><?php echo $tour->currency."$".$tour->infants_price,2; ?>  </span>
              </td>
              <?php } ?>
              
            </tr>       
          </table>
          <div class="infant"><i class="fa fa-child"></i> Free for infants (0-3 years)</div>
        </div>
     </div>
		<?php if(!empty(strip_tags($tour->tour_inclusions))) { ?>
    <div class="include_wra">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="heading_add"><i class="fa fa-check-circle"></i> Tour Inclusions</div>
          <?php echo $tour->tour_inclusions; ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <?php if(!empty(strip_tags($tour->add_ons))) { ?>
          <div class="heading_add"><i class="fa fa-plus-circle"></i> Optional</div>
          <?php echo $tour->add_ons; ?>
          <?php } ?>
        </div>
      </div>
    </div>
		<?php } ?> 
   </div>
</div>
<!--end add ons-->

<!--tab matter-->
<div class="tab_matter_wra">
  <div class="container">
  		<div class="container2">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tab_my" role="tablist">
                <li role="presentation" class="active"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="tab"><i class="fa fa-file-o"></i> Schedule</a></li>
                <li role="presentation" id="reviews_li"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"><i class="fa fa-comment-o"></i> Reviews</a></li>
                <li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab"><i class="fa fa-image"></i> Gallery</a></li>
                <li role="presentation"><a href="#tour_map" aria-controls="tour_map" role="tab" data-toggle="tab"><i class="fa fa-map-o"></i> Tour Map</a></li>
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="schedule">
                  <div class="schedule_wra">
                    <h2 class="heading2"><?php echo $tour->title; ?> <span><?php echo $tour->sub_title; ?></span></h2>
                    <div class="more"><?php echo $tour->description; ?></div>
                    <?php 
                    $sql10 = "SELECT * FROM tour_itinerary WHERE tour_id=".$tour->ID." AND status=1 ORDER BY `ID` ASC";
                    $result10 = $conn->query($sql10);
                    if ($result10->num_rows > 0) {
                      ?>
                    <h2 class="heading4">Tour Itinerary</h2>
                    <div class="schedule_row">
                      <div class="collapse-expand">
                        <a href="#" class="_collapse"><i class="fa fa-minus" aria-hidden="true"></i> Collapse All</a> 
                        <a href="#" class="_expand"><i class="fa fa-plus" aria-hidden="true"></i> Expand All</a>
                      </div>                  
                      <ul class="schedule_list">
                        <?php 
                          $i=1;
                          while($row10 = $result10->fetch_object()) {
                            ?>
                            <li>
                              <span><?php echo $i++; ?>.</span>
                              <h3><?php echo $row10->title; ?></h3>
                              <div class="<?php if($i!=2) echo 'itinerary-description'; ?>">
                                <p><?php echo $row10->description; ?></p>
                              </div>
                              <div class="address-time">
                                <?php if($row10->address) { ?><i class="fa fa-map-marker"></i> <?php echo $row10->address; } ?>  
                                <?php if($row10->datetime) { ?><i class="fa fa-clock-o"></i> <?php echo $row10->datetime; } ?>  
                              </div>
                            </li>
                            <?php
                          }
                        //}
                        ?>
                       </ul> 
                    </div>
                    <?php } ?>
                  </div>  
                  <?php //echo $tour->tour_schedule; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="tour_map">
                  <div class="tour_map">
                    <div id="map_container"></div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="reviews">
                  <div class="review_wra"> 
                    <div class="leave_comment">Leave a Comment</div>
                    <div class="comment_wra">
                      <div id="reviews_add_container"></div>
                      <form action="" method="get" id="form-review">
                        <h3>
                          LEAVE A COMMENT 
                          <span> Rating* 
                          
    <div class="star">
      <div id="1" class="ratenode nomal"></div>
      <div id="2" class="ratenode nomal "></div>
      <div id="3" class="ratenode nomal "></div>
      <div id="4" class="ratenode nomal "></div>
      <div id="5" class="ratenode nomal "></div>
    </div>
    <input type="hidden" name="rating" id="rating" value="0" />                      
                          
                          </span>
                          <div class="clearfix"></div>
                          <input name="tour_id" type="hidden" value="<?php echo $tour->ID; ?>" />
                        </h3> 
                        <div class="mail_not">Your email address will not be published. Required fields are marked *</div>
                        <textarea name="comment" cols="" rows="5" placeholder="Comment" class="txtarea"></textarea>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <input name="name" type="text" placeholder="Name*" class="fld">
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <input name="email" type="text" placeholder="Email*" class="fld">
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <input name="website" type="text" placeholder="Website" class="fld">
                          </div>
                        </div>
                        <button type="button" class="post_btn" id="comment_btn">Post Comment</button>
                      </form>
                    </div>
                  
                    <div class="heading5"><?php echo $tour->no_reviews; ?> Reviews</div>
                    <ul class="review_list" id="reviews_container"></ul>
                    <div id="loader_container"></div>               
                    <div class="text-center">
                      <input type="hidden" name="page" id="page2" value="1" />
                      <input type="button" name="load_more" id="load_more_reviews" onclick="return load_more_reviews('<?php echo $tour->ID; ?>')" class="btn4" value="Load More" style="display:none;" />
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="gallery">
                  <div class="review_wra"> 
                    <div id="gallery_container"></div>
                  </div>
                </div>
              </div>
              
              <div class="book_tour">
              	<?php if($tour->country=='Canada') { ?>
                <div class="xola-checkout xola-custom" data-seller="591328906864eab4788b4593" data-experience="<?php echo $tour->xola_code; ?>" data-version="2">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></div>
                <?php } else { ?>
                <a id="button-booking" class="rezdy rezdy-modal rezdy-custom" href="<?php echo $tour->xola_code; ?>">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
                <?php } ?>
              </div>
                      
              <?php if(trim(strip_tags($tour->pickup_information)) && trim(strip_tags($tour->pickup_information))!='NA') { ?>
              <h2 class="heading4">Pickup Information</h2>
              <div class="txt"><?php echo $tour->pickup_information; ?></div>
              <?php } ?>
              
              <?php if(trim(strip_tags($tour->cancellation_policy)) && trim(strip_tags($tour->cancellation_policy))!='NA') { ?>
              <h2 class="heading4">Cancellation & Refund Policy</h2>
              <div class="txt"><?php echo $tour->cancellation_policy; ?></div>
              <?php } ?>
              
              <?php if(trim(strip_tags($tour->frequently_asked_questions)) && trim(strip_tags($tour->frequently_asked_questions))!='NA') { ?>
              <h2 class="heading4">Frequently Asked Questions</h2>
              <div class="txt"><?php echo $tour->frequently_asked_questions; ?></div>
              <?php } ?>
    
              <?php if(trim(strip_tags($tour->other_information))) { ?>
              <h2 class="heading4">Other Information</h2>
              <?php echo $tour->other_information; ?>
              <?php } ?>
              
              <?php if($tour->country=='Canada') { ?>
              <div class="btn_wra">
                <div class="xola-checkout xola-custom bo ok" data-seller="591328906864eab4788b4593" data-experience="<?php echo $tour->xola_code; ?>" data-version="2"> Book This Tour <i class="fa fa-check" aria-hidden="true"></i> </div>
                <div class="xola-gift xola-custom gift" data-button-id="5915d65c332e75b91f8b461d"> Gift A Tour <i class="fa fa-check" aria-hidden="true"></i></div>
              </div>
              <?php } else { ?>
              <div class="btn_wra">
                <a id="button-booking" class="rezdy rezdy-modal rezdy-custom" href="<?php echo $tour->xola_code; ?>">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
              </div>
              <?php } ?>
              
              <?php /*if(file_exists("uploads/brochure/TONIAGARA-TOURS-BROCHURE.pdf")) { ?>
              <p><a target="_blank" href="<?php echo "/uploads/brochure/TONIAGARA-TOURS-BROCHURE.pdf"; ?>" class="print" downloads><i class="fa fa-print"></i> Print/Download</a></p>
              <?php }*/ ?>
              
              
              <?php /*?><iframe id="forecast_embed" type="text/html" frameborder="0" height="215" width="100%" src="https://forecast.io/embed/#lat=43.0667&amp;lon=-78.5684&amp;name=Niagara Falls&amp;color=#13a1c5&amp;units=ca"> </iframe><?php */?>
              
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="right_side">
                <div id="sidebar2">
                  <div class="sidebar__inner">
                    <?php include 'most_popular_tours.php';?>
                  </div>
                </div>   
              </div>
            </div>
         </div>   
     </div>
   </div>
</div>
<!--end tab matter-->

<ul class="mobile-button">
	<?php if($tour->country=='Canada') { ?>
  <li><div class="xola-checkout xola-custom book_mob" data-seller="591328906864eab4788b4593" data-experience="<?php echo $tour->xola_code; ?>" data-version="2"><i class="fa fa-binoculars"></i> Book This Tour</div></li>
  <?php } else { ?>
  <script type="text/javascript" src="https://toniagara.rezdy.com/pluginJs?script=modal"></script>
  <li><a id="button-booking" class="rezdy rezdy-modal rezdy-custom" href="<?php echo $tour->xola_code; ?>"><i class="fa fa-binoculars"></i> Book This Tour </a></li>
  <?php } ?>
</ul>

<?php include 'footer.php';?>

<?php /*if ( !$detect->isMobile() ) { ?>
<script type="text/javascript" src="/js/rAF.js"></script>
<script type="text/javascript" src="/js/ResizeSensor.js"></script>
<script type="text/javascript" src="/js/sticky-sidebar.js"></script>
<script type="text/javascript">
var stickySidebar = new StickySidebar('#sidebar2', {
	topSpacing: 105,
	bottomSpacing: 20,
	containerSelector: '.container2',
	innerWrapperSelector: '.sidebar__inner'
});
</script>
<?php }*/ ?>

<script type="text/javascript">
$.rating.init(function(cur){ $('#rating').val(cur); });
function out(){ $('#rating').val( $.rating.getCurrentRating() ); }
setInterval("out()",1000);
</script>


<script>
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("href") // activated tab
  if(target=='#gallery') {
		get_data('#gallery_container', SITEURL+'ajax/photos', '<?php echo $tour->ID; ?>');
	}
	else if(target=='#reviews') {
		get_data('#reviews_container', SITEURL+'ajax/reviews', '<?php echo $tour->ID; ?>');
	}
	else if(target=='#tour_map') {
		get_data('#map_container', SITEURL+'ajax/map', '<?php echo $tour->ID; ?>');
	}
});
</script>
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_API; ?>&libraries=places&ver=1.2.4'></script>

<script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="/js/readmore.js"></script>
<script>
$(function(){
	$(".read-more").readmore({ buttonClasses: "r_more" });
	$(".read-more2").readmore({ buttonClasses: "r_more" });
	$(".read-more3").readmore({ buttonClasses: "r_more" });

	$('._expand').click(function(){
		$(this).hide(); $('._collapse').show();
		$('.itinerary-description').slideDown(200);
		return false;
	});
	$('._collapse').click(function(){
		$(this).hide(); $('._expand').show();
		$('.itinerary-description').slideUp(200);
		return false;
	});

	$('.schedule_list li h3').click(function(){
		$(this).next('.itinerary-description').slideToggle(200);
	});

	$("#created_on").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});
	
	$('.leave_comment').click(function(){ $('.comment_wra').toggle(); });
	
	$('#comment_btn').click(function(){
		$('#reviews_add_container').html('<img src="/<?php echo IMAGEROOT; ?>loader.gif"> Processing...');
		$.ajax({
			url:SITEURL+'ajax/comment_add',
			type:'POST',
			data: $('#form-review').serialize(),
			success:function(data) {
				$('#reviews_add_container').html(data);
				$('#form-review').reset();
			}
		});
	});

	var type = window.location.hash.substr(1);
	if(type=='reviews') {
		$('.tab-pane, .nav li').removeClass('active');
		$('#reviews, #reviews_li').addClass('active');
		get_data('#reviews_container', SITEURL+'ajax/reviews', '<?php echo $tour->ID; ?>');
		var height = $("#reviews").offset().top;
		$("html, body").animate({ scrollTop: (height) }, 1000);
	}
	$('.reviews_active').click(function(){
		$('.tab-pane, .nav li').removeClass('active');
		$('#reviews, #reviews_li').addClass('active');
		get_data('#reviews_container', SITEURL+'ajax/reviews', '<?php echo $tour->ID; ?>');
		var height = $("#reviews").offset().top;
		$("html, body").animate({ scrollTop: (height) }, 1000);
		//console.log(height);
	});
	
});
</script>
<?php /*?><script type="text/javascript"> (function() { var co=document.createElement("script"); co.type="text/javascript"; co.async=true; co.src="https://xola.com/checkout.js"; var s=document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(co, s); })(); </script><?php */?>
</body>
</html>
