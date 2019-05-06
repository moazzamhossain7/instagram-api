<?php 
    $post_data = array (
    	'client_id' => 'CLIENT_ID',
    	'client_secret' => 'CLIENT_SECRET',
    	'grant_type' => 'authorization_code',
    	'redirect_uri' => 'YOUR_REDIRECT_URI',
    	'code' => 'CODE'
    );

	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/oauth/access_token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;