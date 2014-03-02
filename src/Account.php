<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

/**
 * Class Account
 * @package DotMailer\Api
 *
 */
class Account extends Service {

	/** @var array */
	private $serviceClasses = array(
		'addressBooks' => 'AddressBooks'
	);

	/** @var array */
	private $serviceInstances = array();

	/** @var \DotMailer\Api\IRestClient Needed for the creation of services */
	private $restClient;


	public function __construct(IRestClient $restClient) {
		$this->restClient = $restClient;
		parent::__construct($restClient);
	}

	public function getInfo() {
		return $this->execute('account-info');
	}

	private function getService($serviceName) {
		if (!isset($this->serviceInstances[$serviceName])) {
			if (!isset($this->serviceClasses[$serviceName])) {
				throw new \Exception(sprintf('Service not defined "%s"', $serviceName));
			}
			$this->serviceInstances[$serviceName] = new $this->serviceClasses[$serviceName]($this->restClient);
		}
		return $this->serviceInstances[$serviceName];
	}

	public function __get($name) {
		return $this->getService($name);
	}

}

