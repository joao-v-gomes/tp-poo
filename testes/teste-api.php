<?php

namespace yidas\googleMaps;

require '../libs/vendor/autoload.php';

// use \home\joao\ufmg\poo\tp-poo\vendor\yidas\google-maps-services\src\Client;

include_once("../libs/vendor/yidas/google-maps-services/src/Client.php");


$gmaps = new Client(['key' => 'AIzaSyAKO8HqZTt4EKzxGe7Hn7MT0lcC5OX0g-8']);


// $directionsResult = $gmaps->directions([-19.94751786178283, -44.0338132658227], [-19.94737917123246, -44.03814662247021], [
//     'mode' => "car",
//     'departure_time' => time(),
// ]);

// https://www.google.com/maps/dir/?api=1&origin=Space+Needle+Seattle+WA&destination=Pike+Place+Market+Seattle+WA&travelmode=driving
// https://www.google.com/maps/dir/?api=1&origin=null&origin_place_id=ChIJ1-uW8PGVpgAR5ktf1d6AZwA&destination=null&destination_place_id=ChIJUySS7m-VpgARiMhNXG3b_P8&travelmode=walking
// https://www.google.com/maps/dir/?api=1&origin=Google+Pyrmont+NSW&destination=blabla&destination_place_id=ChIJISz8NjyuEmsRFTQ9Iw7Ear8&travelmode=walking

// https://www.google.com/maps/dir/?api=1&origin=null&origin_place_id=ChIJ1-uW8PGVpgAR5ktf1d6AZwA&waypoints=Planet+Insulfims+Contagem&waypoint_place_id=ChIJzatiN5OVpgARIEG5t9tCAhw&destination=null&destination_place_id=ChIJUySS7m-VpgARiMhNXG3b_P8&travelmode=walking

//https://www.google.com/maps/dir/?api=1

// $url = "https://www.google.com/maps/dir/?api=1";

// $url .= "&origin=null&origin_place_id=ChIJ1-uW8PGVpgAR5ktf1d6AZwA";

// $url .= "&waypoint=Planet+Insulfims+Contagem&waypoint_place_id=ChIJzatiN5OVpgARIEG5t9tCAhw";

// $url .= "&destination=null&destination_place_id=ChIJUySS7m-VpgARiMhNXG3b_P8";

// $url .= "&travelmode=bicycling";

// print_r($url);

//ChIJzatiN5OVpgARIEG5t9tCAhw 

$origem = "Av Jose Faria da Rocha - 514 - Contagem - MG - 32315040";

// $origemFix = "";


$origem = str_replace("-", "", $origem);

print_r($origem . "\n");

$origem = str_replace(" ", "+", $origem);

print_r($origem . "\n");

$origem = str_replace("++", "+", $origem);

print_r($origem . "\n");

// foreach (explode(" ", $origem) as $key => $value) {

//     // if ($value == 'A') {
//     //     // continue;
//     //     print_r("Achou o a");
//     // }



//     $origemFix .= $value . "+";
// }

// print_r($origemFix);

// $destino = "BeerBrothers - Contagem";
// $destino = "Planet Insulfims - Contagem";

// $testeDir = $gmaps->directions($origem, $destino, [
//     'mode' => "car",
//     'departure_time' => time(),
// ]);

// print_r($directionsResult);

// print_r($testeDir);

// $local = $gmaps->geocode('Av Jose Faria da Rocha - 514 - Contagem - MG - 32315040');

// $localReverso = $gmaps->reverseGeocode([-19.94751786178283, -44.0338132658227]);

// $localReverso = $gmaps->reverseGeocode([37.4223878, -122.0841877]);


// print_r($local);

// print_r($localReverso);


// $local1 = $local[0]['geometry']['location'];


// print_r($local1);


// $local2 = $local[0]['formatted_address'] . "\n";

// print_r($local2);


// $local3 = $localReverso[0]['formatted_address'] . "\n";

// print_r($local3);
