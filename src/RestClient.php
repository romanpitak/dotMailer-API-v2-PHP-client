<?php
/**
 *
 * http://api.dotmailer.com/v2/help/wadl
 * http://www.dotmailer.co.uk/api/more_about_api/api_error_codes.aspx
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

use RestClient\Client,
	RestClient\Request;

/**
 * Class RestClient
 *
 * Bridge class providing the IRestClient interface.
 *
 * @package DotMailer\Api
 */
class RestClient implements IRestClient {

	/** @var \RestClient\Client */
	private $restClient;

	public function __construct($username, $password) {

		$this->restClient = new Client(array(
			Request::BASE_URL_KEY => 'https://api.dotmailer.com/v2',
			Request::USERNAME_KEY => $username,
			Request::PASSWORD_KEY => $password,
			Request::USER_AGENT_KEY => 'romanpitak/dotmailer-api-v2-php-client',
			Request::HEADERS_KEY => array(
				'Content-Type' => 'application/json'
			),
			Request::CURL_OPTIONS_KEY => array(
				CURLOPT_SSL_VERIFYPEER => false
			),
		));

	}

	public function execute($param_arr, $responses = array()) {

		// when only url is supplied
		if (is_string($param_arr)) {
			$param_arr = array($param_arr);
		}

		// get request
		$callback = array($this->restClient, 'newRequest');
		$request = call_user_func_array($callback, $param_arr);

		// get response
		$response = $request->getResponse();

		/*
		 * process response
		 */

		// get return code
		$returnCode = $response->getInfo()->http_code;

		// is there a special action to be done?
		if (isset($responses[$returnCode])) {
			return call_user_func($responses[$returnCode], $response);
		}

		// default response processing
		switch ((int)$returnCode) {
			case 200:
			case 201:
			case 202:
				return $response->getParsedResponse();
				break;
			case 204: // no content
				return 'OK';
			default:

				// todo solve this maybe nicer?
				throw new \Exception($response->getParsedResponse(), $returnCode);

				$message = 'ERROR';
				$response = $response->getParsedResponse();
				// todo solve HTML response on 404
				if (isset($response['message'])) {
					$message = $response['message'];
				} elseif ("" != $result->getError()) {
					$message = $result->getError();
				}
				throw new \Exception($message, $returnCode);
		}
	}


}