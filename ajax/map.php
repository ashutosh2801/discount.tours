<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 2;
$offset = $limit * ($page-1);

//echo $sql = "SELECT * FROM tour_itinerary WHERE tour_id=4 ORDER BY `ID` ASC";
$sql = "SELECT * FROM tour_itinerary WHERE tour_id=".$_POST['tour_id']." AND status=1 AND latitude<>'' AND longitude<>'' ORDER BY `ID` ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$i=1;
	$data = $markers = array();
	while($row = $result->fetch_object()) {
		$markers[] = array(	
												'title'				=> addslashes($row->title), 
												'date_time'		=> $row->datetime, 
												'address'			=> addslashes($row->address),
												'lat'					=> $row->latitude,
												'lng'					=> $row->longitude,
												//'description'	=> $row->description,
												'marker_icon'	=> "map-marker-$i.png",
										);
		$i++;
	}
	
	$data = array(
									"markers" 								=> $markers, 
									"marker_url" 							=> "/images/marker/", 
									"lat"											=> "-33.8688", 
									"lng"											=> "151.2195",
									"zoom"										=> "15",
									"polyline_color"					=> "#00a8ff",
									"polyline_stroke_opacity"	=> "1", 
									"polyline_stroke_weight"	=> "3"
								);
		//echo '<pre>'; print_r($data);
		//echo json_encode($data, true);						
?>
<div id="tour-map" style="width:100%; height:400px">	</div>
<script src="/js/map-script.js" type="text/javascript"></script>
<script type='text/javascript'>
var PlgIntravelTourMapCfg = <?php echo json_encode($data); ?>;
</script>
<script>
initTourDetailMap();
</script>
<?php
}
?>
