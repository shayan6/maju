 
<?php
 
$endDate = date("Y-m-d", strtotime($args['endDate']. ' + 1 days'));

$query = $db->fetch("SELECT day FROM rpt_vintage_vint_graph WHERE `day` LIKE '$endDate'");


$field = "";
if(empty($query)){

	$query = $db->fetch("SELECT MAX(`day`) as day FROM rpt_vintage_vint_graph");

	foreach ($query as $key) {
	    $endDate = $key->day;
	}

	 $i = date('Y-m-d', strtotime($startDate. " + {$startPoint} days "));
	 for($j = 0; $j < $pageSize; $j++ ){
	 	$field .= "," . json_encode($i);
		$i = date('Y-m-d', strtotime($i. ' + 1 days'));
		if(  strtotime($endDate) < strtotime($i) ){
			break;
		}
	}
	// echo "empty";
}else {


 $i = date('Y-m-d', strtotime($startDate. " + {$startPoint} days "));
 for($j = 0; $j < $pageSize; $j++ ){
	 	$field .= "," . json_encode($i);
		$i = date('Y-m-d', strtotime($i. ' + 1 days'));
		if(  strtotime($endDate) < strtotime($i) ){
			break;
		}
	}
	// print_r($query);
}


$field = str_replace('"','`',$field);
