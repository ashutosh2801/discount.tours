<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

//header('Content-Type: text/csv; charset=utf-8');  
//header('Content-Disposition: attachment; filename=data.csv');
  
$sql = "SELECT * FROM `tour_tours` WHERE status=1;";
$query = $conn->query($sql);
if($query->num_rows > 0 ) 
{
	$delimiter = ",";
	$filename = "facebook-catelog-product-feed.csv";
	
	$output = fopen("php://memory", "w");  
	$fields = array('id', 'title', 'description', 'link', 'image_link', 'travel_type', 'category_name', 'price', 'location_name', 'city', 'province_state', 'country', 'phone_number', 'latitude', 'longitude', 'star_rating', 'region_name', 'proximity_city', 'proximity_airport', 'origin_name', 'origin_code', 'origin_city', 'origin_country', 'origin_latitude', 'origin_longitude', 'destination_name', 'destination_city', 'destination_country', 'destination_latitude', 'destination_longitude', 'free_cancellation', 'payment_options', 'tax_fees', 'availability_start', 'availability_end', 'included_guests_count', 'age_restrictions', 'included_activities', 'itinerary', 'duration', 'brand', 'availability', 'condition'); 
	fputcsv($output, $fields, $delimiter);
		 
//echo 'Done';		
	while($row = $query->fetch_object()) 
	{
		$gallery = $itinerary = array();
		$description = strip_tags($row->description);
		$description = trim(preg_replace('/\s\s+/', ' ', $description));
		//echo $string.'----------------------------------';
		$title 						= strip_tags($row->title." ".$row->sub_title);
		$link  						= tour_urlMap('tours', $row->slug);
    	$image_link 			= "https://www.toniagara.com/uploads/tours/thumb/".$row->tour_thumb;
		
		$cats = $categoris = array();
		$categoris = explode(",",$row->category);
		foreach($categoris as $cat) {
			if($cat!='home-page' && $cat!='niagara-falls' && $cat!='hornblower-tours' && $cat!='niagara')
			$cats[] = ucwords(str_replace("-"," ",trim($cat)));
		}
		$category_name 		= implode(", ",$cats);
		
		//Home Page,niagara Falls,bus Tours,tours Canada,sightseeing Tours, Home Page,niagara Falls,bus Tours,tours Canada,sightseeing Tours, Home Page,niagara Falls,bus Tours,tours Canada,sightseeing Tours, Home 
		
		//$category_name 		= str_replace("  ", " ", ucwords(str_replace("-"," ",str_replace(",", ", ",$row->category))));
		//$category_name 		= str_replace(array('Home Page,','Niagara Falls,','Niagara Falls', 'Hornblower Tours', 'Niagara'),'',$category_name);
		
		if($category_name && $row->tour_types)
		$category_name.= ','.$row->tour_types;
		else if($row->tour_types)
		$category_name.= $row->tour_types;
		
		$adults_price 		= currency($conn, $row->adults_price, $row->currency);
		
		$sql_gallery = "SELECT * FROM `tour_gallery` ORDER BY rand() LIMIT 24";
		$query_gallery = $conn->query($sql_gallery);
		while($row_gallery = $query_gallery->fetch_object()) {
			$gallery[] = "https://www.toniagara.com/uploads/tours/".strip_tags($row_gallery->image_name);
		}		
    	$addi_image_link	= implode(",",$gallery);
		
		$sql_ = "SELECT * FROM `tour_itinerary` WHERE tour_id=".$row->ID;
		$query_ = $conn->query($sql_);
		while($row_ = $query_->fetch_object()) {
			$itinerary[] = strip_tags($row_->title);
		}		

		if(!empty($row->date_allow)) {
			$date_allow = explode(' - ',$row->date_allow);
			$start_date				= trim($date_allow[0]);
			$end_date 				= trim($date_allow[1]);
		}
		else {
			$start_date				= date('Y-m-d');
			$end_date 				= date('Y-m-d',strtotime('+5 years'));
		}
		
		if($row->country=='USA') {
			$location_name 				= 'Niagara Falls';
			$city 								= 'Niagara Falls'; 
			$province_state 			= 'New York';
			$country 							= 'USA';
			$latitude							= '40.7128';
			$longitude						= '74.0060';
			$proximity_city				= 'Buffalo';
			$proximity_airport		= 'Buffalo Niagara International Airport';
			$origin_name 					= 'Buffalo';
			$origin_code					= 'BUF';
			$origin_city 					= 'Buffalo';
			$origin_country 			= 'US';
			$origin_latitude			= '40.7128';
			$origin_longitude			= '74.0060';
			//$destination_name			= 'Niagara Falls';	
			//$destination_city			= 'Niagara Falls';	
			$destination_country	= 'US';	
			$destination_latitude	= '37.0902';	
			$destination_longitude= '95.7129';	
			$tax_fees							= '0';
		}
		else {
			$location_name 				= 'Niagara Falls';
			$city 								= 'Niagara Falls'; 
			$province_state 			= 'Ontario';
			$country 							= 'Canada';
			$latitude							= '43.6532';
			$longitude						= '79.3832';
			$proximity_city				= 'Toronto';
			$proximity_airport		= 'Toronto Pearson International Airport';
			$origin_name 					= 'Toronto';
			$origin_code					= 'YYZ';
			$origin_city 					= 'Toronto';
			$origin_country 			= 'CA';
			$origin_latitude			= '43.6532';
			$origin_longitude 		= '79.3832';
			//$destination_name			= 'Niagara Falls';	
			//$destination_city			= 'Niagara Falls';	
			$destination_country	= 'CA';	
			$destination_latitude	= '56.1304';	
			$destination_longitude= '106.3468';
			$tax_fees							= '13';
		}
		
		$availability_start		= $start_date;	
		$availability_end			= $end_date;

		$destination_name 	= 'Niagara Falls';
		$destination_city		= 'Niagara Falls';
		$star_rating				= 5;
		$payment_options		= 'Visa, MasterCard, American Express';
		$included_guests_count= 500;
		
		$travel_type	= strpos($row->category,'Airplane Tours') ? 'air' : 'activities';
		//$travel_type 			= 'activities';
		
		$free_cancellation	= strpos($row->category,'Hornblower Tours') ? 'No' : 'Yes';
		$age_restrictions		= 'None';
		$included_activities= strip_tags( str_replace('<li>',',',$row->tour_inclusions) );
		$included_activities= trim(preg_replace('/\s\s+/', ' ', $included_activities));
		$included_activities= substr($included_activities,1);
		$itinerary 					= substr(implode(",",$itinerary),0,149);
		$duration 					= strip_tags($row->duration);
		$brand 							= 'ToNiagara';		
		
		//$lineData = array( $row->ID."_sku_adults", $title, $description, $link, $image_link, $addi_image_link, $travel_type, trim($category_name), round($adults_price,2), $location_name, $city, $province_state, $country, '+1 800-653-2242', $latitude, $longitude, $star_rating, 'Niagara', $proximity_city, $proximity_airport, $origin_name, $origin_code, $origin_city, $origin_country, $origin_latitude, $origin_longitude, $destination_name	,$destination_city, $destination_country,	$destination_latitude,	$destination_longitude,	$free_cancellation,	$payment_options,	$tax_fees,	$availability_start,	$availability_end,	$included_guests_count,	$age_restrictions,	$included_activities,	$itinerary,	$duration, $brand );
		$lineData = array( $row->ID."_sku_adults", $title, $description, $link, $image_link, $travel_type, trim($category_name), round($adults_price,2), $location_name, $city, $province_state, $country, '+1 800-653-2242', $latitude, $longitude, $star_rating, 'Niagara', $proximity_city, $proximity_airport, $origin_name, $origin_code, $origin_city, $origin_country, $origin_latitude, $origin_longitude, $destination_name	,$destination_city, $destination_country,	$destination_latitude,	$destination_longitude,	$free_cancellation,	$payment_options,	$tax_fees,	$availability_start,	$availability_end,	$included_guests_count,	$age_restrictions,	$included_activities,	$itinerary,	$duration, $brand, 'in stock', 'new' );
		fputcsv($output, $lineData, $delimiter);
	}
	
	//move back to beginning of file
	fseek($output, 0);
	
	//set headers to download file rather than displayed
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $filename . '";');
	
	//output all remaining data on a file pointer
	fpassthru($output);
}
$conn->close();