<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

use DotMailer\Api\Rest\IClient;

abstract class Service {

	/** @var IClient */
	private $restClient;

	public function __construct(IClient $restClient) {
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