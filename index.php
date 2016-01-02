<?php 
require "vendor/autoload.php";

use API\APIRepository;

/**
 * Retrieve all Plusdeal restaurants
 */
function plusdealRestaurants(){
	$api = new APIRepository();

	return $api->request('plusdeal/restaurants');
}

/**
 * Retrieve all Plusdeal orders
 */
function plusdealOrders(){
	$api = new APIRepository();

	return $api->request('plusdeal/orders');
}

echo json_encode( plusdealOrders() );