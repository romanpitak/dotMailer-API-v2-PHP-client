<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


final class ApiAccountProperty extends JsonObject {

	protected $keys = array(
		'Name' => 'XsString',
		'Type' => 'XsString',
		'Value' => 'XsString',
	);

} 