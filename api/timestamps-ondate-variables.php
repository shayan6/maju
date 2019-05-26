<?php
	
    $startDate = date("Y-m-d 00:00:00", strtotime($args['startDate']. ' + 1 days'));
  	$endDate = date("Y-m-d 23:59:59", strtotime($args['startDate']. ' + 1 days'));

      if($args['field']  === 'Verification Requests') { 
        $field = 'verification_request_at';
      }
      else if($args['field']  === 'Signups'){
        $field = 'signup_at';
      }
      else if($args['field']  === 'Verified Profiles'){
        $field = 'verified_at';
      }
      else if($args['field']  === 'Wallets Linked'){
        $field = 'wallet_linked_at';
      }
      else if($args['field']  === 'Unique Limits'){
        $field = 'limit_at';
      }
      else if($args['field']  === 'Disbursements'){
        $field = 'disbursement_at';
      }