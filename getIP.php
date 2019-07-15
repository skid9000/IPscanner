<?php
	require 'vendor/autoload.php';
	use GeoIp2\Database\Reader;
	header('Content-type: application/json');

	$reader = new Reader('assets/geoip-db/GeoLite2-City.mmdb');
	$ip = $_SERVER['REMOTE_ADDR'];
	$record = $reader->city($ip);
	
	$country = $record->country->name;

	$lat = $record->location->latitude;
	$long = $record->location->longitude;

	$array = array('ip'=>$ip, 'country'=>$country, 'region'=>null, 'city'=>null, 'lat'=>$lat, 'long'=>$long);

	echo json_encode($array);
?>