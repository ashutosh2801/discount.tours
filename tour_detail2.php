<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');

$detect = new Mobile_Detect;

if(!empty($_GET['slug']))
{
	$sql = "SELECT * FROM tour_tours WHERE status=1 AND slug='".addslashes($_GET['slug'])."'";
	//$sql = "SELECT * FROM tour_tours WHERE slug='".addslashes($_GET['slug'])."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$tour = $result->fetch_object();
		
		$adults_price 	= currency($conn, $tour->adults_price, $tour->currency);
		$children_price = currency($conn, $tour->children_price, $tour->currency);
		$seniors_price 	= currency($conn, $tour->seniors_price, $tour->currency);
		$infants_price 	= currency($conn, $tour->infants_price, $tour->currency);

		$tour_count = $tour->tour_count + 1;
		$sql2 = "UPDATE `tour_tours` SET `tour_count`='$tour_count' WHERE ID=".$tour->ID.";";
		$conn->query($sql2);
	} else {
    //header('Location: /error?url=/tours/'.$_GET['slug']);
    header('Location: /');
		exit;
	}
} 
else {
	header('Location: /tours');
	exit;
}
$no_reviews = 0;
$sql0 = "SELECT tour_id FROM tour_reviews WHERE tour_id='".$tour->ID."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
	$no_reviews = $result0->num_rows;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $tour->meta_description; ?> Updated <?php echo date('Y-m-d'); ?>"/>
<meta name="keywords" content="<?php echo $tour->meta_keyword; ?>"/>
<title><?php echo $tour->meta_title; ?></title>
<?php $title = strip_tags($tour->title." ".$tour->sub_title); ?>
<?php $slug  = tour_urlMap('tours', $tour->slug); ?>
<?php $image = "https://www.discounttours.com/uploads/tours/".$tour->banner_image; ?>
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=$image;?>" />
<meta property="og:site_name" content="<?=SITENAME;?>" />
<meta property="og:title" content="<?=$title; ?>" />
<meta property="og:description" content="<?=$title; ?>" />
<meta property="og:url" content="<?=$slug; ?>" />
<meta property="twitter:site" content="discounttours.com" />
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
<?php /*?><link href="<?php echo APPROOT; ?>css/viewbox.css" rel="stylesheet">
<link href="<?php echo APPROOT; ?>css/responsive.min.css" rel="stylesheet"><?php */?>
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
		"reviewCount" : "<?php echo $no_reviews; ?>"
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
"priceRange": "<?php echo ($children_price>0) ? "$".$children_price." - "."$".$adults_price : "$".$adults_price; ?>",
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
<?php if($adults_price>0) { ?>
<?php echo ", ".$tour->adults_label; ?> - <?php echo "CA$".$adults_price." ".$tour->adults_text; ?>
<?php } if($seniors_price>0) { ?>
<?php $label = strtolower($tour->seniors_label); ?>
<?php echo ", ".$tour->seniors_label; ?> - <?php echo "CA$".$seniors_price." ".$tour->seniors_text; ?>
<?php } if($children_price>0) { ?>
<?php $label = strtolower($tour->children_label); ?>
<?php echo ", ".$tour->children_label; ?> - <?php echo "CA$".$children_price; ?>
<?php } else if(trim($tour->children_text)) { ?>
<?php echo ", ".$tour->children_label; ?> - <?php echo $tour->children_text; ?>
<?php } if($infants_price>0) { ?>
<?php echo ", ".$tour->infants_label; ?> - <?php echo "CA$".$infants_price; ?>
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
    "url": "<?php echo "https://www.discounttours.com/uploads/brochure/".$tour->brochure; ?>"
  },
	"offers": {
    "@type": "Offer",
    "name": "<?php echo $tour->title; ?>",
    "price": "<?php echo "$".($adults_price); ?>",
    "priceCurrency": "CA",
		"availabilityEnds": "<?php echo date('Y-m-d', strtotime("+2 days")); ?>",
    "eligibleRegion": {
      "@type": "Country",
      "name": "CA"
    },
    "offeredBy": {
      "@type": "Organization",
      "name": "<?=SITENAME;?>",
      "url": "https://www.discounttours.com/"
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
<div class="day_banner_wra">
  <div class="detail_banner_shadow">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <img itemprop="image" src="<?php echo $tour->tour_thumb; ?>?ver=<?php echo $tour->ID; ?>" alt="<?php echo $tour->title; ?>" class="img-res">
        </div>
        <div class="col-lg-5">
          <div class="banner_txt_l viator">
            <h3><?php echo $tour->location; ?></h3>
            <h2><?php echo $tour->title; ?> <span><?php echo $tour->sub_title; ?></span> <span><b class="<?php echo $tour->tag_class; ?>"><?php echo $tour->tag_type; ?></b></span></h2>
            <div class="hour">
              <?php if(trim($tour->duration)) { ?><i class="fa fa-clock-o"></i> <?php echo $tour->duration; ?><?php } ?>  
              <i class="fa fa-comment-o"></i> <a href="#reviews" class="reviews_active"><?php echo $no_reviews; ?> Reviews</a>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <div class="price2">
              <?php echo "US $".($tour->original_price); ?>
            </div>
          <div class="btn_wra1">
          <a class="rezdy-custom" href="<?php echo $tour->tour_link; ?>" target="_blank">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
          </div>
          </div>
          <br />
          <div class="row">
        <div class="col-lg-12">
					<?php 
          $count = 2; 
          if(!empty(trim($tour->duration))) $count = $count + 1; 
          if($adults_price>0) $count = $count + 1; 
          if($seniors_price>0) $count = $count + 1; 
          if($children_price>0) $count = $count + 1; 
          if(!empty(trim($tour->infants_label))) $count = $count + 1; 
          ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_icon tbl_icon<?=$count; ?>">
            <tr>
              <td>
                <img src="<?php echo IMAGEROOT; ?>location.png" alt="">
                Location<span><?php echo $tour->location; ?>  </span>
              </td>
              <td>
                <img src="<?php echo IMAGEROOT; ?>review.png" alt="review.png">
                Reviews <span><a href="#reviews" class="reviews_active"><?php echo $no_reviews; ?> Reviews</a></span>
              </td>
              <?php if(!empty(trim($tour->duration))) { ?>
              <td>
                <img src="<?php echo IMAGEROOT; ?>time.png" alt="time.png">
                Duration<span><?php echo $tour->duration; ?>  </span>
              </td>
              <?php } ?>
              <?php if($adults_price>0) { ?>
              <td <?php //if($seniors_price==0 && $children_price==0 && $infants_price==0) echo 'colspan="3" class="center"'; ?>>
                <?php if($tour->adults_icon) $icon = $tour->adults_icon; else $icon = 'adult.png'; ?>
                <img src="/images/<?=$icon;?>" alt="adult.png">
                <?php echo $tour->adults_label; ?>
                
                <span><?php echo $tour->original_price ? '<em>CA$'.$tour->original_price.'</em>':''; ?> <?php //if($tour->ID==8) { echo "<i>"."CA$".$adults_price." ".$tour->adults_text."</i>"; } else { echo "CA$".$adults_price." ".$tour->adults_text; } ?><?php  echo "CA$".$adults_price." <b>".$tour->adults_text.'</b>'; ?></span>
              </td>
              <?php } if($seniors_price>0) { ?>
              <td>
                <?php $label = strtolower($tour->seniors_label); ?>
                <?php $img = (strpos($label, 'people')!== false || strpos($label, 'person')!== false) ? 'adult.png' : 'senior.png'; ?>
                <img src="<?php echo IMAGEROOT; ?><?php echo $img; ?>" alt="<?php echo $img; ?>">
                <?php echo $tour->seniors_label; ?><span><?php echo "CA$".$seniors_price." <b>".$tour->seniors_text.'</b>'; ?>  </span>
              </td>
              <?php } if($children_price>0) { ?>
              <td>
                <?php $label = strtolower($tour->children_label); ?>
                <?php $img = (strpos($label, 'people')!== false || strpos($label, 'person')!== false) ? 'adult.png' : 'children.png'; ?>
                <img src="<?php echo IMAGEROOT; ?><?php echo $img; ?>" alt="<?php echo $img; ?>">
                <?php echo $tour->children_label; ?><span><?php echo "CA$".$children_price; ?>  </span>
              </td>
              <?php } if(!empty(trim($tour->infants_label)))  { ?>
              <td>
                <img src="<?php echo IMAGEROOT; ?>infants.png" alt="infants.png">
                <?php echo $tour->infants_label; ?><span>Free  </span>
              </td>
              <?php } ?>
              
            </tr>       
          </table>
        </div>
     </div>
          
        </div>
        
      </div>
    </div>
  </div>
</div>
<!--end banner-->


<!--tab matter-->
<div class="tab_matter_wra">
  <div class="container">
  		<div class="container2">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <!-- Nav tabs -->
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="schedule">
                  <div class="schedule_wra">
                    <h2 class="heading2"><?php echo $tour->title; ?> <span><?php echo $tour->sub_title; ?></span> <span><b class="<?php echo $tour->tag_class; ?>"><?php echo $tour->tag_type; ?></b></span></h2>
                    <div class="more"><?php echo $tour->description; ?></div>
                    <?php 
                    $sql10 = "SELECT * FROM tour_itinerary WHERE tour_id=".$tour->ID." AND status=1 ORDER BY `ID` ASC";
                    $result10 = $conn->query($sql10);
                    if ($result10->num_rows > 0) {
                      ?>
                    
                    <div class="btn_wra2">
											<?php /*if($tour->country=='Canada') { ?>
                      <div class="xola-checkout xola-custom" data-seller="591328906864eab4788b4593" data-experience="<?php echo $tour->xola_code; ?>" data-version="2">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></div>
                      <?php } else { ?>
                      <a id="button-booking" class="rezdy rezdy-modal rezdy-custom" href="<?php echo $tour->xola_code; ?>">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
                      <?php }*/ ?>
                      <a class="rezdy-custom" href="<?php echo '/cart?id='.$tour->ID; ?>">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
                    </div>
                    
                    
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
                </div>                
              </div>  
                
                
              
              <div class="btn_wra3">
                <a class="rezdy-custom" href="<?php echo $tour->tour_link; ?>" target="_blank">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a>
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
              
              
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
  <li><a class="rezdy-custom" href="<?php echo '/cart?id='.$tour->ID; ?>">Book This Tour <i class="fa fa-check" aria-hidden="true"></i></a></li>
</ul>

<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
  'detail_id': '<?php echo $tour->ID; ?>',
  'detail_revenue' : '<?php echo $tour->adults_price; ?>'
});

dataLayer.push({
  'event': 'productClick',
  'ecommerce': {
    'click': {
      'actionField': {'list': 'Search Results'},
      'products': [{
        'name': '<?php echo $tour->title; ?>',
        'id': '<?php echo $tour->ID; ?>',
        'price': '<?php echo $tour->adults_price; ?>',
        'category': '<?php echo $tour->category; ?>'
       }]
     }
   }
});

dataLayer.push({
  'event': 'productDetail',
  'ecommerce': {
    'detail': {
      'actionField': {'list': 'Search Results'},
      'products': [{
        'name': '<?php echo $tour->title; ?>',
        'id': '<?php echo $tour->ID; ?>',
        'price': '<?php echo $tour->adults_price; ?>',
        'category': '<?php echo $tour->category; ?>'
       }]
     }
   }
});

</script>

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

<?php /*?><script src="<?php echo APPROOT; ?>js/jquery.viewbox.min.js"></script><?php */?>
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
	<?php if($tour->is_tour_map) { ?>
	else if(target=='#tour_map') {
		get_data('#map_container', SITEURL+'ajax/map', '<?php echo $tour->ID; ?>');
	}
	<?php } ?>
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
