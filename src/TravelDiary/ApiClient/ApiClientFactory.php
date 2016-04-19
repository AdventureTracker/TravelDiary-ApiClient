<?php

/**
 * Created by PhpStorm.
 * User: jdubec
 * Date: 19/04/16
 * Time: 15:23
 */

class ApiClientFactory
{

	/**
	 * @var string
	 */
	protected $baseUri;

	/**
	 * @var string
	 */
	protected $clientSecret;

	/**
	 * @var string
	 */
	protected $clientToken;

	/**
	 * ApiClientFactory constructor.
	 * @param string $baseUri
	 * @param string $clientSecret
	 * @param string $clientToken
	 */
	public function __construct($baseUri, $clientSecret, $clientToken)
	{
		$this->baseUri = $baseUri;
		$this->clientSecret = $clientSecret;
		$this->clientToken = $clientToken;
	}

	/**
	 * @param string $baseUri
	 */
	public function setBaseUri($baseUri)
	{
		$this->baseUri = $baseUri;
	}

	/**
	 * @param string $clientSecret
	 */
	public function setClientSecret($clientSecret)
	{
		$this->clientSecret = $clientSecret;
	}

	/**
	 * @param string $clientToken
	 */
	public function setClientToken($clientToken)
	{
		$this->clientToken = $clientToken;
	}

	public function create() {
		$client = new \GuzzleHttp\Client([
			'base_url' 			=> $this->baseUri,
			'headers' 			=> [
				'X-TravelDiary-Token' 		=> $this->clientToken,
				'X-TravelDiary-Device' 		=> $this->clientSecret,
				'Content-Type' 				=> 'application/json'
			]
		]);

		return $client;
	}


}