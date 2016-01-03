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
			'client_id' => '[enter the client id]', 
			'client_secret' => '[enter the client secret]', 
			'username' => '[enter the username]', 
			'password' => '[enter the user password]'
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
    	public function get( $segment ){

		$response = $this->getApi()->get( $segment );

		if( $response ) return $response->json();

		return Response::json(null, 200);
    	}

    	/**
    	 * Store new resource using POST method by specify an endpoint segment and optional parameters.
    	 * @param  [type] $segment  Endpoint segment.
    	 * @param  array  $params  Optional parameters.
    	 * @return [type]          JSON format result.
    	 */
    	public function post( $segment, array $params = array() ){

    		$response = $this->getApi()->post( $segment, $params );

		if( $response ) return $response->json(); 

		return Response::json(null, 200);
    	}


    	/**
    	 * Store new resource using PUT method by specify an endpoint segment and optional parameters.
    	 * @param  [type] $segment Endpoint segment.
    	 * @param  array  $params  Optional parameters.
    	 * @return [type]          JSON format result.
    	 */
    	public function put( $segment, array $params = array() ){

    		$response = $this->getApi()->put( $segment, $params );

		if( $response ) return $response->json(); 

		return Response::json(null, 200);
    	}
}