<?php
	
  header('Access-Control-Allow-Origin: *');
  
  //$_POST['api_key'] - $_POST['api_secret']
	$key = ''; 
	$secret = '';
	$nonce=time();
	
	$uri='https://bittrex.com/api/v1.1/market/get?apikey='.$key.'&nonce='.$nonce;
	
	$sign=hash_hmac('sha512',$uri,$secret);
	$ch = curl_init($uri);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('apisign:'.$sign));
	$execResult = curl_exec($ch);
	$obj = json_decode($execResult);

?>
