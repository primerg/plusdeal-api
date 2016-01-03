<?php 
namespace API;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Event\Emitter;
use GuzzleHttp\Event\ErrorEvent;

class API {

	protected $key;
	protected $endpoint;
	protected $client;

	/**
	 * Create a HTTP Client instance.
	 * @param [type] $key         API Credentials
	 * @param [type] $endpoint    specific location to API request.
	 * @param [type] $httpHeaders HTTP Headers
	 */
	public function __construct( $key, $endpoint, $httpHeaders = null ){
		$this->key = $key;
		$this->endpoint = $endpoint;

		$this->setClient([
			'endpoint' => $endpoint,
			'defaults' => [  
				'headers' => $httpHeaders,
				'verify' => false,
			],
			'emitter' => null
		]);
	}	



	/**
	 * GET Request
	 * @param  [type]     $endpoint  API location
	 * @param  array|null $queryData Optional GET data.
	 * @return [type]                [description]
	 */
	public function get( $endpoint, array $queryData = null) {

		$token = $this->getToken();
		
		if( !$token ) return false;

		$query = '';
		if (! is_null( $queryData ) ) {
			foreach( $queryData as $field => $value) {
				$query .= "&$field=$value";
			}
		}

		$endpoint = 'v1/' . $endpoint . '?access_token=' . $token . $query;
		
		return $this->client->get( $endpoint );
	}




	/**
	 * POST Request
	 * @param  [type]     $endpoint API location
	 * @param  array|null $postdata Optional POST data.
	 * @return [type]               [description]
	 */
	public function post($endpoint, array $data = array() ) {

		$token = $this->getToken();

		if( !$token ) return false;

		$endpoint = 'v1/' . $endpoint;

		return $this->client->post( $endpoint, [
			'body' => array_merge($data, ['access_token' => $token])
		]);
    	}


    	/**
	 * PUT Request
	 * @param  [type]     $endpoint API location
	 * @param  array|null $postdata Optional PUT data.
	 * @return [type]               [description]
	 */
	public function put($endpoint, array $data = array() ) {

		$token = $this->getToken();

		if( !$token ) return false;

		$endpoint = 'v1/' . $endpoint;

		return $this->client->put( $endpoint, [
			'body' => array_merge($data, ['access_token' => $token])
		]);
    	}



    	/**
    	 * Set the HTTP Client instance.
     	 * @param [type] $config Specific configurations needed.
    	 */
    	private function setClient( $config ){
		$this->client = new Client([
			'base_url' => $config['endpoint'],
			'defaults' => $config['defaults'],
			'emitter' => $config['emitter']
		]);
	}



	/**
	 * Retrieve the HTTP Client instance.
	 * @return [type] [description]
	 */
	private function getClient() { 
		return $this->client;
	}



	/** Retrieve the token */
	private function getToken(){
		$this->key['grant_type'] = 'password'; // Insert grant type.

		$response = $this->client->post('oauth/access_token',[
			'body' => $this->key
		]);
		
		return $response->json()['access_token'];
	}
}