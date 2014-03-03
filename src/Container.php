<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api;

class Container implements \ArrayAccess, \Iterator {

	const USERNAME = 'username';
	const PASSWORD = 'password';

	/** @var array */
	private $credentials = array();

	/** @var array */
	private $containers = array();

	private function __construct($credentials = array()) {
		$this->credentials = $credentials;
	}

	/**
	 * Creates a new Container.
	 *
	 * Creates a container based on the credentials.
	 *
	 * @param array $credentials
	 * @return Container
	 */
	public static function newContainer($credentials) {
		return new self($credentials);
	}

	/**
	 * Creates a new account.
	 *
	 * Creates a new RestClient based on the credentials and returns a new Account based on that RestClient instance.
	 *
	 * @param array $credentials
	 * @return Account
	 * @throws \Exception
	 */
	public static function newAccount($credentials) {
		if ((!isset($credentials[self::USERNAME])) || (!isset($credentials[self::PASSWORD]))) {
			throw new \Exception('Invalid credentials');
		}
		$restClient = new RestClient($credentials[self::USERNAME], $credentials[self::PASSWORD]);
		return new Account($restClient);
	}

	/**
	 * @param string $name
	 * @return array of credentials
	 * @throws \Exception
	 */
	private function getCredentials($name) {
		if (!isset($this->credentials[$name])) {
			throw new \Exception('Credentials "' . $name . '" not found.');
		}
		return $this->credentials[$name];
	}

	/**
	 * @param $name
	 * @return Account|Container
	 * @throws \Exception
	 */
	private function createContainer($name) {
		$credentials = $this->getCredentials($name);
		try {
			return self::newAccount($credentials);
		} catch (\Exception $e) {
			return self::newContainer($credentials);
		}
	}

	/**
	 * @param string $name
	 * @return Account|Container
	 */
	private function getContainer($name) {
		if (!isset($this->containers[$name])) {
			$this->containers[$name] = $this->createContainer($name);
		}
		return $this->containers[$name];
	}

	/*
	 * ========== Overloading ==========
	 */

	public function __get($key) {
		return $this->getContainer($key);
	}

	public function __call($name, $arguments) {
		return call_user_func_array(array($this->current(), $name), $arguments);
	}

	/*
	 * ========== ArrayAccess ==========
	 */

	public function offsetExists($offset) {
		return isset($this->credentials[$offset]);
	}

	public function offsetGet($offset) {
		return $this->getContainer($offset);
	}

	public function offsetSet($offset, $value) {
		throw new \Exception('Values are read-only.');
	}

	public function offsetUnset($offset) {
		throw new \Exception('Values are read-only.');
	}

	/*
	 * ========== Iterator ==========
	 */

	public function current() {
		return $this->getContainer($this->key());
	}

	public function key() {
		return key($this->credentials);
	}

	public function next() {
		next($this->credentials);
	}

	public function rewind() {
		reset($this->credentials);
	}

	public function valid() {
		return isset($this->credentials[$this->key()]);
	}

}