<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertTocountry'))
{
function convertTocountry($p)
{

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.geoplugin.net/php.gp?ip=".$p,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  /*CURLOPT_HTTPHEADER => array(
    "authorization: Basic ".$auth
  ),*/
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;
  $json = "";
} else {
  //echo $response;
 
}
return $response;

}

}