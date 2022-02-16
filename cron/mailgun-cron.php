<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$ch = curl_init();
		
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'api:key-12f062264f6fc5e55db3c3716bbf5ab5');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/mg.toniagara.com/log?limit=300&skip=0');

$result = json_decode(curl_exec($ch));
//echo '<pre>'; print_r($result); exit;
$cnt = 0;
foreach($result->items as $res)
{
	$sql = "SELECT * FROM tour_emails WHERE email_response='".$res->message_id."'";
	$query = $conn->query($sql);
	while($row = $query->fetch_object()) 
	{
		$set =array();
    if($res->hap=='clicked')
			$set[] = 'is_clicked = 1';
    if($res->hap=='opened')
			$set[] = 'is_opened = 1';
    if($res->hap=='delivered')
			$set[] = 'is_delivered = 1';
	
		if(!empty($set)) {
			$q = implode(',',$set);
			$sql2 = "UPDATE tour_emails SET $q WHERE id=".$row->id;
			if($conn->query($sql2))
			$cnt++;
		}
		unset($set);
		unset($q);
		unset($sql2);
		//echo $res->message_id.'---'.$res->hap . "<br />";
	}
		//unset($sql);
		//unset($query);
}				  
echo "$cnt updated";							  
?>