<?php
/**
* @Programmer: AES
* @Description: When device ip change then automatically set proper ip address on poolspa securedsowing configuration
* Please change ':8080' ip address. 
**/

// Get cURL resource
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://securedshowing.com/dynamic_ipaddress/getip',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'pro_number' => 'Enter Your property Number (original property number)',
        
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
echo '<pre>';
print_r($resp);

// Close request to clear up some resources
curl_close($curl);
?>