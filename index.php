<?php 
require "vendor/autoload.php";

use API\APIRepository;

$api = new APIRepository();

/**
 * Retrieve all restaurants
 * */
 echo json_encode( $api->get('plusdeal/restaurants') ); // Retrieve all restaurants
 
 // SAMPLE RESULTS"
 
 ...
 
 
 /**
  * Retrieve a single restaurant 
  */
  echo json_encode( $api->get('plusdeal/restaurants/38') );
  
  // SAMPLE RESULTS"
 
 ...
 
/**
 * Retrieve all orders
 * /
echo json_encode( $api->get('plusdeal/orders') ); 

// SAMPLE RESULTS"
 
...

/**
 * echo json_encode( $api->get('plusdeal/orders/914') );
 * /

// SAMPLE RESULTS"
 
...

/**
 * Update a single order
 * /

echo json_encode( $api->put('plusdeal/orders/914') )

// SAMPLE RESULTS"
 
...

/**
 * Complete a single order
 * /

...
