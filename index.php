<?php 
require "vendor/autoload.php";

use API\APIRepository;

$api = new APIRepository();

//echo json_encode( $api->get('plusdeal/restaurants') ); // Retrieve all restaurants
echo json_encode( $api->get('plusdeal/orders') ); // Retrieve all orders
//echo json_encode( $api->get('plusdeal/orders/914') ); // Retrieve a single order
//echo json_encode( $api->put('plusdeal/orders/914') ); // Update a single order