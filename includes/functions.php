<?php

if( !empty($_GET['cjevent']) ) 
{
	$time = time() + (86400 * 30);
	setcookie('utm_campaign', $_GET['utm_campaign'], $time, "/");
	setcookie('utm_medium', $_GET['utm_medium'], $time, "/");
	setcookie('utm_source', $_GET['utm_source'], $time, "/");
	setcookie('cjevent', $_GET['cjevent'], $time, "/");
	setcookie('batcheventID', $_GET['batcheventID'], $time, "/");
}

function currency_symbol($currency)
{
	switch($currency)
	{
	    case 'INR': $symbol = '<i class="fa fa-inr"></i> ';
	    break;
	    case 'AUD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'NZD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'EUR': $symbol = '<i class="fa fa-eur"></i> ';
	    break;
	    case 'GBP': $symbol = '<i class="fa fa-gbp"></i> ';
	    break;
	    case 'CAD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'CHF': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'NOK': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'JPY': $symbol = '<i class="fa fa-jpy"></i> ';
	    break;
	    case 'SEK': $symbol = '<i class="fa fa-shekel"></i> ';
	    break;
	    case 'HKD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'SGD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'USD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'ZAR': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    case 'TWD': $symbol = '<i class="fa fa-usd"></i> ';
	    break;
	    default: $symbol = '<i class="fa fa-usd"></i> ';
	}
	return $_COOKIE['currency'].' '.$symbol;
}

function price_calculator($price)
{
	$price30 = (30*$price)/100;
	$sub_price = $price+$price30;
	$price20 = (20*$sub_price)/100;
	$total_price = $sub_price-$price20;
	$array['sub_price'] = currency_symbol($_COOKIE['currency']).number_format($sub_price,2);
	$array['total_price'] = currency_symbol($_COOKIE['currency']).number_format($total_price,2);
	return $array;
}

function set_cookie($country='United States', $currency='USD')
{
    //echo $_COOKIE['country']."!=".$country;
	$time = time() + (86400 * 30);
	if( $_COOKIE['country']!=$country) {
        setcookie('country', $country, $time, "/");
	}
	if( $_COOKIE['currency']!=$currency) {
        setcookie('currency', $currency, $time, "/");
	}
}

function discount($conn, $promo, $subtotal) {
	$discount = 0;
	$today = date('Y-m-d');
	$sql = "SELECT * FROM tour_discount WHERE campaign='$promo' AND '$today'>=start_date and '$today'<=end_date LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_object();
		if($row->discount_name=='booking' && $row->discount_type=='%')
			$discount 		= ($subtotal * $row->discount)/100;
		else if($row->discount_name=='booking' && $row->discount_type=='$')
			$discount 		= $row->discount;
		else if($row->discount_name=='person' && $row->discount_type=='%')
			$discount 		= ($subtotal * $people * $row->discount)/100;
		else if($row->discount_name=='person' && $row->discount_type=='$')
			$discount 		= ($people * $row->discount);
	}
	return $discount;
}

function validateName($name) {
    if (preg_match("/^[a-zA-Z'. -]+$/", $name)) {
        return true;  
    }
    return false;
}

function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;  
    }
    return false;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function session($new=false) {
  if(!$_SESSION['session_id'] || $new==true) {
		$_SESSION['session_id'] = rand(1000,9999).session_id();
	}
	//echo $_SESSION['session_id'];
	return $_SESSION['session_id'];
}

function date_differ($date1, $date2) {
	//echo date('Y-m-d h:i:s',$date2)." - ".date('Y-m-d h:i:s',$date1);
	$date = $date2 - $date1;
	$hour = ceil($date/3600);
	return $hour>0 ? $hour : 0; //return in hour
}

function currency($conn, $price, $from='CA', $to='CA') {
	if( (strtoupper($from)=='US') && (strtoupper($to)=='CA') ) {
		$sql = "SELECT * FROM `tour_options` WHERE name='USDCAD' LIMIT 1";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) {
			$res = $query->fetch_object();
			$price = round(($price * $res->value),2);
		}
	}
	return $price;
}

function tour_thumb($filename) {
	$filename = $filename ? $filename : 'na';
	//if(file_exists("/home/h7k6nn9ecp6b/public_html/uploads/tours/thumb/$filename")) {
		return APPROOT."uploads/tours/thumb/$filename";
	//}
}

function tour_banner($filename) {
	$filename = $filename ? $filename : 'na';
	//if(file_exists("/home/h7k6nn9ecp6b/public_html/uploads/tours/$filename")) {
		return APPROOT."uploads/tours/$filename";
	//}
}

function category_urlMap($slug) {
	return SITEURL."/niagara-falls-$slug";
}

function tour_urlMap($country, $slug) {
	$country = urlMap($country);
	return SITEURL."/$country/$slug";
}

function urlMap($name) {
	return $str = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name));	
}

function file_contents($url) 
{
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$contents = curl_exec($ch);
	if (curl_errno($ch)) {
		echo curl_error($ch);
		echo "\n<br />";
		$contents = '';
	} else {
		curl_close($ch);
	}
	
	if (!is_string($contents) || !strlen($contents)) {
		echo "Failed to get contents.";
		$contents = '';
	}
	
	return $contents;
}

function orderId( )
{
	$str = strtoupper(md5(uniqid(rand(), true)));
	return substr($str,0,6);
}

function saveLog($conn, $user_id, $email_response, $type)
{
	$email_response = trim(str_replace(array("<",">"),"",$email_response));
	$sql = "INSERT INTO `tour_emails` (`user_id`, `is_sent`, `type`, `status`, `email_response`, `timestamp`) VALUES ('$user_id', '1', '$type', '1', '".$email_response."', CURRENT_TIMESTAMP);";
	$query = $conn->query($sql);
}

function getLog()
{
	$ch = curl_init();
		
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.MAILGUN_DOMAIN.'/log');
	
	$result = json_decode(curl_exec($ch));
	curl_close($ch);
	return $result;
}

function sendMail($user, $subject, $message, $from = array(SITEEMAIL,SITENAME)) 
{
	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$plain 	 = strip_tags(nl2br($message));
	
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.MAILGUN_DOMAIN.'/messages');
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(
		'from' 			=> SITENAME." <".SITEEMAIL.">",
		'to' 				=> "$user[1] <$user[0]>",
		'subject' 	=> $subject,
		'html' 			=> $message,
		'text' 			=> $plain,
		'o:tracking'=> 'yes',
		'h:Reply-To'=> SITEEMAIL, 
	));
	
	$result = json_decode(curl_exec($ch));
	//$info = curl_getinfo($ch);
	//print_r($info);
	curl_close($ch);
	return $result;
}

function country_all($conn) {
    $sql = "SELECT `country` FROM `tour_tours` WHERE country<>'' GROUP BY country";
    $result = $conn->query($sql);
	return $result;
}
	
function currency_all($conn) {
    $sql = "SELECT `lable` FROM `tour_pricing` WHERE 1 GROUP BY `lable`";
    $result = $conn->query($sql);
	return $result;
}
	
function query_all($conn, $table, $where=1, $order='`order` ASC') {
	$sql = "SELECT * FROM $table WHERE $where ORDER BY $order";
	$result = $conn->query($sql);
	return $result;
}

function tour_detail($conn, $id) {
	$sql = "SELECT * FROM tour_tours WHERE ID=$id";
	$result = $conn->query($sql);
	return $result->fetch_object();
}

function attendees($conn, $uid, $tid) {
	$sql = "SELECT * FROM tour_customer_attendees WHERE user_id=$uid AND tour_id=$tid";
	return $result = $conn->query($sql);
	//return $result->fetch_object();
}

function tour_count($conn, $condition='status=1', $order='`order` ASC') {
	$sql = "SELECT A.ID FROM tour_tours  as A JOIN tour_pricing as B ON A.ID=B.tour_id WHERE $condition ORDER BY $order";
	$result = $conn->query($sql);
	echo $result->num_rows ." Tours Available";
}

function category_list_by_tour($conn, $slug) {
    //WHERE FIND_IN_SET(cat_slug, '$slug')
    $sql = "SELECT * FROM tour_category  GROUP BY cat_name ORDER BY rand() LIMIT 40";
	$result = $conn->query($sql);
	if( $result->num_rows ) {
	    while($model = $result->fetch_object()) {
	        echo '<li><a href="/category/'.$model->cat_slug.'">'.$model->cat_name.'</a></li>';
	    }
	}
}

function tour_count_all($conn, $condition='status=1', $order='`order` ASC') {
	$sql = "SELECT * FROM tour_tours WHERE $condition ORDER BY $order";
	$result = $conn->query($sql);
	echo $result->num_rows;
}

function tour_most_popular($conn, $condition='A.status=1') 
{
	$sql = "SELECT B.lable,B.price, A.* FROM tour_tours as A JOIN tour_pricing as B ON A.ID=B.tour_id WHERE $condition ORDER BY A.tour_count DESC LIMIT 6";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<ul class="popular-tour row">';
		while($model = $result->fetch_object()) {
		    if($row++%3==0) echo '</ul><ul class="row">';
			//$adults_price = currency($conn, $model->adults_price, $model->currency);
			$url = tour_urlMap('tours', $model->slug);

			if($model->type=='viator') {
				$img = $model->tour_thumb;
				$price = price_calculator($model->price);
				$cut_price = '<b class="old_price">'. $price['sub_price'].'</b>';
				$big_price = '<a href="'. $url .'">'. $price['total_price'] .'</a>';
			}
			else {
			    $adults_price = currency($conn, $model->adults_price, $model->currency);
				$img = tour_thumb($model->tour_thumb);
				$cut_price = $model->original_price ? '<b class="old_price">'.number_format($model->original_price,2).'</b>':'';
				$big_price = '<a href="'. $url .'">'.number_format($adults_price,2) . " <span>" . $model->adults_text.'</span></a>';
			}
		?>
    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="tour_box" itemtype="http://schema.org/TouristTrip" itemscope>
          <a href="<?php echo $url; ?>"><img itemprop="image" src="<?php echo $img; ?>?ver=<?php echo $model->ID; ?>" alt="<?php echo $model->title; ?>" title="<?php echo $model->title; ?>" class="img-res"></a>
          <h4 itemprop="name"><a href="<?php echo $url; ?>"><?php echo $model->title; ?> <span><?php echo $model->sub_title; ?></span></a> <span><b class="<?php echo $model->tag_class; ?>"><?php echo $model->tag_type; ?></b></span></h4>
          <div class="str2">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <div class="duration">
			<?php if(trim($model->duration)) { ?>
    			Duration: <span><?php echo $model->duration; ?></span>
            <?php } ?>
          </div>
          <div class="clearfix"></div>
          <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
            <meta itemprop="price" content="<?php echo '$'.$adults_price; ?>" />
            <meta itemprop="priceCurrency" content="CA" />
          	<div class="price">
                <?php echo $cut_price; ?>
                <?php echo $big_price; ?>
            </div>
          </div>  
          <div class="book_btn"><a href="<?php echo $url; ?>">Book Now</a></div>
          <div class="clearfix"></div>
          <meta itemprop="url" content="<?php echo $url; ?>" />
          <meta itemprop="touristType" content="Sightseeing" />
          <meta itemprop="description" content="<?php echo strip_tags($model->description); ?>" />
      </div>
    </li>
    <?php	
		}
		echo '</ul>';
	}
}

function procedure_list($result)
{
	if ($result->num_rows > 0) 
	{
		$row = 0;
		$dataLayer = array();
		$priceLable = "Price".$_COOKIE['currency'];
		while( $model = $result->fetch_object() ) 
		{
			if($row++%3==0) echo '</ul><ul class="row">';
			$url = tour_urlMap('tours', $model->slug);
			$adults_price = $model->adults_price;

			$productObj = array(
								'id' 		=> $model->ID, 
								'name' 		=> $model->title,
								'price' 	=> $adults_price,
								'duration' 	=> $model->duration,
								'list'		=> 'Search Results',
								'category' 	=> $model->category
							);
			$dataLayer[] = $productObj;
			

			if($model->type=='viator') {
    			$img = $model->tour_thumb;
				$price = price_calculator($model->price);
				$cut_price = '<b class="old_price">'. $price['sub_price'].'</b>';
				$big_price = '<a href="'. $url .'">'. $price['total_price'] .'</a>';
			}
			else {
				$img = tour_thumb($model->tour_thumb);
				$cut_price = $model->original_price ? '<b class="old_price">'.$_COOKIE['currency'].' '.$model->original_price.'</b>':'';
				$big_price = '<a href="'. $url .'">'.$_COOKIE['currency'].' '.$adults_price . " <span>" . $model->adults_text.'</span></a>';
			}
		?>
            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="tour_box" itemtype="http://schema.org/TouristTrip" itemscope>
                <a href="<?php echo $url; ?>"><img itemprop="image" src="<?php echo $img; ?>?ver=<?php echo $model->ID; ?>" alt="<?php echo $model->tour_thumb; ?>" class="img-res"></a>
                <h3 itemprop="name"><a href="<?php echo $url; ?>"><?php echo $model->title; ?> <span><?php echo $model->sub_title; ?></span></a> <span><b class="<?php echo $model->tag_class; ?>"><?php echo $model->tag_type; ?></b></span></h3>
                <div class="str">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <?php if(trim($model->duration)) { ?>
                <div class="duration">Duration: <span><?php echo $model->duration; ?></span></div>
        		<!--<div class="duration" onclick="return productClick('[<?php echo json_encode($productObj); ?>]')">Duration: <span><?php echo $model->duration; ?></span></div>-->
                <?php } ?>
                <div class="clearfix"></div>
                <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                  <meta itemprop="price" content="<?php echo '$'.$adults_price; ?>" />
                  <meta itemprop="priceCurrency" content="CAD" />
                  <div class="price">
                  	<?php echo $cut_price; ?>
                  	<?php echo $big_price; ?>
                  </div>
                </div>  
                <div class="book_btn"><a href="<?php echo $url; ?>">Book Now</a></div>
                <div class="clearfix"></div>
                <meta itemprop="url" content="<?php echo $url; ?>" />
                <meta itemprop="touristType" content="Sightseeing" />
                <meta itemprop="description" content="<?php echo strip_tags($model->description); ?>" />
              </div>
            </li>
        <?php	
		}
		$limit = trim(substr($limit,-2));
		if($result->num_rows<$limit) {
			echo '<script>setTimeout(function(){ $("#load_more_products").hide(); },200);</script>';
		}
echo "<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
  'event': 'impressionsView',
  'ecommerce': {
    'currencyCode': 'CAD',
    'impressions': ".json_encode($dataLayer)."
  }
});
</script>";
	}
	else {
		echo '<script>setTimeout(function(){ $("#load_more_products").hide(); },200);</script>';
	}
	
}

function home_procedure($conn, $country='Canada', $currency='PriceUSD', $order_by='TT.ID DESC', $offset=0, $limit='12') 
{
	$result = $conn->query("CALL get_product_list('$country','$currency','$order_by', '$offset', '$limit')");
	procedure_list($result);
	$result ? $result->close()  : '';
    $conn->next_result();
}

function tour_list($conn, $condition='', $order='TT.`order` ASC', $limit='12') 
{
	$priceLable = "Price".$_COOKIE['currency'];
	//echo $sql = "SELECT ID,type,title,sub_title,description,slug,adults_price,currency,duration,category,original_price,adults_text,tour_thumb FROM tour_tours WHERE $condition ORDER BY $order LIMIT $limit";
	$sql = "SELECT TP.lable,TP.price, TT.ID,TT.type,TT.title,TT.sub_title,TT.description,TT.slug,TT.adults_price,TT.currency,TT.duration,TT.category,TT.original_price,TT.adults_text,TT.tour_thumb 
	FROM tour_tours as TT 
	JOIN tour_pricing as TP ON TT.ID=TP.tour_id 
	WHERE $condition 
	GROUP BY TT.tour_code 
	ORDER BY $order 
	LIMIT $limit";
	//echo "CALL get_product_list_dynamic('$order', '$offset', '$limit', $condition)";
	//$result = $conn->query("CALL get_product_list_dynamic('$order', '$offset', '$limit', $condition)");
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$row = 0;
		$dataLayer = array();
		while($model = $result->fetch_object()) {
			if($row++%3==0) echo '</ul><ul class="row">';
			$url = tour_urlMap('tours', $model->slug);
			

// 			$productObj = array(
// 								'id' 		=> $model->ID, 
// 								'name' 		=> $model->title,
// 								'price' 	=> $adults_price,
// 								'duration' 	=> $model->duration,
// 								'list'		=> 'Search Results',
// 								'category' 	=> $model->category
// 							);
// 			$dataLayer[] = $productObj;
			

			if($model->type=='viator') {
				$img = $model->tour_thumb;
				$price = price_calculator($model->price);
				$cut_price = '<b class="old_price">'. $price['sub_price'].'</b>';
				$big_price = '<a href="'. $url .'">'. $price['total_price'] .'</a>';
			}
			else {
			    $adults_price = currency($conn, $model->adults_price, $model->currency);
				$img = tour_thumb($model->tour_thumb);
				$cut_price = $model->original_price ? '<b class="old_price">'.number_format($model->original_price,2).'</b>':'';
				$big_price = '<a href="'. $url .'">'.number_format($adults_price,2) . " <span>" . $model->adults_text.'</span></a>';
			}
		?>
    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="tour_box" itemtype="http://schema.org/TouristTrip" itemscope>
        <a href="<?php echo $url; ?>"><img itemprop="image" src="<?php echo $img; ?>?ver=<?php echo $model->ID; ?>" alt="<?php echo $model->tour_thumb; ?>" class="img-res"></a>
        <h3 itemprop="name"><a href="<?php echo $url; ?>"><?php echo $model->title; ?> <span><?php echo $model->sub_title; ?></span></a> <span><b class="<?php echo $model->tag_class; ?>"><?php echo $model->tag_type; ?></b></span></h3>
        <div class="str">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
        </div>
        <?php if(trim($model->duration)) { ?>
        <div class="duration">Duration: <span><?php echo $model->duration; ?></span></div>
		<!--<div class="duration" onclick="return productClick('[<?php echo json_encode($productObj); ?>]')">Duration: <span><?php echo $model->duration; ?></span></div>-->
        <?php } ?>
        <div class="clearfix"></div>
        <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
          <meta itemprop="price" content="<?php echo '$'.$adults_price; ?>" />
          <meta itemprop="priceCurrency" content="CAD" />
          <div class="price">
          	<?php echo $cut_price; ?>
          	<?php echo $big_price; ?>
          </div>
        </div>  
        <div class="book_btn"><a href="<?php echo $url; ?>">Book Now</a></div>
        <div class="clearfix"></div>
        <meta itemprop="url" content="<?php echo $url; ?>" />
        <meta itemprop="touristType" content="Sightseeing" />
        <meta itemprop="description" content="<?php echo strip_tags($model->description); ?>" />
      </div>
    </li>
    <?php	
		}
		$limit = trim(substr($limit,-2));
		if($result->num_rows<$limit) {
			echo '<script>setTimeout(function(){ $("#load_more_products").hide(); },200);</script>';
		}
		echo "<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
  'event': 'impressionsView',
  'ecommerce': {
    'currencyCode': 'CAD',
    'impressions': ".json_encode($dataLayer)."
  }
});
</script>";
	}
	else {
		echo '<script>setTimeout(function(){ $("#load_more_products").hide(); },200);</script>';
	}
	$result ? $result->close()  : '';
    $conn->next_result();
}

function paginattion($current_page, $total_pages, $page_url) {
	$pagination = '';
	if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages)
	{ //verify total pages and current page number
		$pagination .= '<ul class="pagination">';
		
		$right_links    = $current_page + 3; 
		$previous       = $current_page - 3; //previous link 
		$next           = $current_page + 1; //next link
		$first_link     = true; //boolean var to decide our first link
		
		if($current_page > 1){
			$previous_link = ($previous==0)?1:$previous;
			$pagination .= '<li class="first"><a href="'.$page_url.'&page=1" title="First">&laquo;</a></li>'; //first link
			//$pagination .= '<li><a href="'.$page_url.'&page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
				for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
					if($i > 0){
						$pagination .= '<li><a href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
					}
				}   
			$first_link = false; //set first link to false
		}
		
		if($first_link){ //if current active page is first link
			$pagination .= '<li class="first active"><a>'.$current_page.'</a></li>';
		}elseif($current_page == $total_pages){ //if it's the last active link
			$pagination .= '<li class="last active"><a>'.$current_page.'</a></li>';
		}else{ //regular current link
			$pagination .= '<li class="active"><a>'.$current_page.'</a></li>';
		}
				
		for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
			if($i<=$total_pages){
				$pagination .= '<li><a href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
			}
		}
		if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages)? $total_pages : $i;
				//$pagination .= '<li><a href="'.$page_url.'&page='.$next_link.'" >&gt;</a></li>'; //next link
				$pagination .= '<li class="last"><a href="'.$page_url.'&page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
		}
		
		$pagination .= '</ul>'; 
	}
	return $pagination; //return pagination links
}

?>