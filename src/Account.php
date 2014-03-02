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
 *
 * @property-read AddressBooks addressBooks
 * @property-read Campaigns campaigns
 * @property-read Contacts contacts
 */
final class Account extends Service {

	/** @var array */
	private $serviceClasses = array(
		'addressBooks' => 'AddressBooks',
		'campaigns' => 'Campaigns',
		'contacts' => 'Contacts',
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

	/**
	 * @param $serviceName
	 * @return Service
	 * @throws \Exception
	 */
	public function getService($serviceName) {
		if (!isset($this->serviceInstances[$serviceName])) {
			if (!isset($this->serviceClasses[$serviceName])) {
				throw new \Exception(sprintf('Service not defined "%s"', $serviceName));
			}
			$className = __NAMESPACE__ . '\\' . $this->serviceClasses[$serviceName];
			$this->serviceInstances[$serviceName] = new $className($this->restClient);
		}
		return $this->serviceInstances[$serviceName];
	}

	public function __get($name) {
		return $this->getService($name);
	}

}

