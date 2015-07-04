<?php
/**
* @Programmer: AES
* @Description: When device ip change then automatically set proper ip address on poolspa securedsowing configuration
**/

$curl = curl_init();
$apache_port_number ='XX'; // please enter apache port number instead XX
$proerty_number='XXXX'; // please enter property number instead XXXX
$ospi_port_number='XXXX'; //please enter  ospi port  number instead XXXX


// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://securedshowing.com/dynamic_ipaddress/getip',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'pro_number' => $proerty_number,
	  'apache_port_number' => $apache_port_number,
	'ospi_port_number' => $ospi_port_number
        
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
echo '<pre>';
print_r($resp);

// Close request to clear up some resources
curl_close($curl);
?>
