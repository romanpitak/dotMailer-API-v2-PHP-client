<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;


/**
 * Class ApiDataField
 *
 * @property XsString name
 * @property ApiDataTypes type
 * @property ApiDataFieldVisibility visibility
 * @property Mixed defaultValue
 */
class ApiDataField extends JsonObject {

	protected $keys = array(
		'Name' => 'XsString',
		'Type' => 'ApiDataTypes',
		'Visibility' => 'ApiDataFieldVisibility',
		'DefaultValue' => 'Mixed'
	);

}

