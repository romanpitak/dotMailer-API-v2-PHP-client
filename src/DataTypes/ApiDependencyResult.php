<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api\DataTypes;

/**
 * Class ApiDependencyResult
 *
 * @property ApiDependencyList dependencies
 * @property XsBoolean result
 */
class ApiDependencyResult extends JsonObject {

	protected $keys = array(
		'Dependencies' => 'ApiDependencyList',
		'Result' => 'XsBoolean'
	);

}
