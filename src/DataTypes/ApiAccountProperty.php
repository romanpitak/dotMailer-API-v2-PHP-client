<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


/**
 * Class ApiAccountProperty
 *
 * @property XsString name
 * @property XsString type
 * @property XsString value
 */
final class ApiAccountProperty extends JsonObject {

	protected $keys = array(
		'Name' => 'XsString',
		'Type' => 'XsString',
		'Value' => 'XsString',
	);

} 