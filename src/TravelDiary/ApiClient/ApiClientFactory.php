<?php

namespace TravelDiary\ApiClient;

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
	protected $baseUri = null;

	/**
	 * @var string
	 */
	protected $clientSecret = null;

	/**
	 * @var string
	 */
	protected $clientToken = null;

	/**
	 * ApiClientFactory constructor.
	 * @param string $baseUri
	 */
	public function __construct($baseUri)
	{
		$this->baseUri = $baseUri;
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

		$config = [
			'base_url' 			=> $this->baseUri,
			'headers' 			=> [
				'Content-Type' 				=> 'application/json'
			]
		];

		if ($this->clientSecret)
			$config['headers']['X-TravelDiary-Device'] = $this->clientSecret;

		if ($this->clientToken)
			$config['headers']['X-TravelDiary-Token'] = $this->clientToken;

		return new \GuzzleHttp\Client($config);
	}


}