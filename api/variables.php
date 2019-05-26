<?php
	
	$flag = false;

    $startDate = date("Y-m-d 00:00:00", strtotime($args['startDate']. ' + 1 days'));
	$dayNum = (date('N', strtotime($startDate)));
	
	if($dayNum == 8){
		$dayNum = 1;
	}

	$endDate = date("Y-m-d 00:00:00", strtotime($args['endDate']. ' + 1 days'));
	$pageNo = $args['pageNo'];
	$pageSize = $args['pageSize'];
	$startPoint = ($pageNo * $pageSize) - $pageSize;

	if(is_numeric($pageSize) && is_numeric($pageNo)){
		$flag = true;
		$message = 'Success';
	}
	else{
		$message = 'Invalid Page No Or Page Size';
	}