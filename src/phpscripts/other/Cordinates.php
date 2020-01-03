<?php

if(isset($_POST['lat'], $_POST['lng'])) {
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    $url = sprintf("https://eu1.locationiq.com/v1/reverse.php?key=pk.80a2fe56fa87a84b47776eb521639575&lat=%s&lon=%s&format=json"
        , $lat, $lng);
    $curl = curl_init($url);

curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER    =>  true,
  CURLOPT_FOLLOWLOCATION    =>  true,
  CURLOPT_MAXREDIRS         =>  10,
  CURLOPT_TIMEOUT           =>  30,
  CURLOPT_CUSTOMREQUEST     =>  'GET',
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response=json_decode($response, true);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response['address']['country_code'].",".$response['address']['city'].",".$response['address']['road'].$response['address']['house_number'];
}
}

?>