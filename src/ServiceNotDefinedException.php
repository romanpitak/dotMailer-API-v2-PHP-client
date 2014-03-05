<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api;


final class ServiceNotDefinedException extends Exception {
	public function __construct($service) {
		$this->message = sprintf('Service "%s" not defined!', $service);
	}
} 