<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

class Service {

	/** @var \DotMailer\Api\IRestClient */
	private $restClient;

	public function __construct(IRestClient $restClient) {
		$this->restClient = $restClient;
	}

	/**
	 *
	 * @param array|string $param_arr
	 * @param array $responses
	 * @return string
	 */
	protected function execute($param_arr, $responses = array()) {
		// when only th url is supplied
		if (is_string($param_arr)) {
			$param_arr = array($param_arr);
		}
		return $this->restClient->execute($param_arr, $responses);
	}

}