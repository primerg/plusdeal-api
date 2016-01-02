<?php
namespace API;

require "vendor/autoload.php";

class APIRepository {

	public function __construct(){

	}

	/**
	 * Get the PHP HTTP client that makes it easy to send HTTP requests to integrate with web services.
	 */
	public function getApi() {
		$api =  new API([
			'client_id' => 'plusdeal_client', 
			'client_secret' => '6?tARGUJysq^KE2z', 
			'username' => 'plusdeal@plusdeal.com', 
			'password' => '4kTQGVVzH&n&UAkqz'
		],
		'http://devapi.tableme.com/' );
		//'http://table-api.app/' );

		return $api;
    	}
    	
    	/**
    	 * Retrieve request using GET method by specify an endpoint segment.
    	 * @param  [type] $segment endpoint segment.
    	 * @return [type]          JSON format response
    	 */
    	public function request( $segment ){

		$response = $this->getApi()->get( $segment );
		if( $response ) {
			return $response->json();
		}

		return Response::json(null, 200);
    	}
}