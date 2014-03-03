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
 *
 * Mix of a service provider and a service.
 * Creates and holds service instances (Campaigns, Contacts etc.).
 * Services are accessible via magic properties or method "getContainer".
 * Provides methods that don't fit into any service ot fit into the service "Account".
 *
 * @property-read AddressBooks addressBooks
 * @property-read Campaigns campaigns
 * @property-read Contacts contacts
 * @property-read DataFields dataFields
 * @property-read Segments segments
 *
 */
final class Account extends Service {

	/** @var array */
	private $serviceClasses = array(
		'addressBooks' => 'AddressBooks',
		'campaigns' => 'Campaigns',
		'contacts' => 'Contacts',
		'dataFields' => 'DataFields',
		'segments' => 'Segments'
	);

	/** @var array */
	private $serviceInstances = array();

	/** @var \DotMailer\Api\IRestClient Needed for the creation of services */
	private $restClient;


	public function __construct(IRestClient $restClient) {
		$this->restClient = $restClient;
		parent::__construct($restClient);
	}

	/*
	 * ========== Service Container ==========
	 */

	/**
	 * Get service instance.
	 *
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

	/*
	 * ========== Service ==========
	 */

	/**
	 * Gets a summary of information about the current status of the account.
	 *
	 * @return mixed
	 */
	public function getInfo() {
		return $this->execute('account-info');
	}

	/**
	 * Gets the UTC time as set on the server.
	 *
	 * @return mixed
	 */
	public function getServerTime() {
		return $this->execute('server-time');
	}

}

