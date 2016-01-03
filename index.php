<?php 
require "vendor/autoload.php";

use API\APIRepository;

$api = new APIRepository();

//echo json_encode( $api->request('plusdeal/restaurants') ); // Retrieve all restaurants
//echo json_encode( $api->request('plusdeal/orders') ); // Retrieve all orders
echo json_encode( $api->request('plusdeal/orders/914') ); // Retrieve a single order
