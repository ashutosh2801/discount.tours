<?php
require_once('includes/config.php');
require_once('includes/functions.php');

$condition='status=1';
if(!empty($_REQUEST['term']))
$condition.=" AND (lower(title) like '%".strtolower($_REQUEST['term'])."%' OR lower(sub_title) like '%".strtolower($_REQUEST['term'])."%')";

$sql = "SELECT * FROM tour_tours WHERE $condition ORDER BY title ASC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$model = $data = array();
	while($model = $result->fetch_object()) {
		
		$url = tour_urlMap('tours', $model->slug);
		
		$arr['link'] = $url;
		//$arr['label'] = $model->title." ".$model->sub_title;
		$arr['label'] = $model->title;
		$arr['value'] = $model->title;
		array_push($data, $arr);
	}
}
echo json_encode($data);
?>