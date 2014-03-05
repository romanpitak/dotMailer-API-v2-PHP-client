<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;

/**
 * Class ApiDependency
 *
 * @property ApiBusinessObjectType type
 * @property XsInt objectId
 */
final class ApiDependency extends JsonObject {

	protected $keys = array(
		'Type' => 'ApiBusinessObjectType',
		'ObjectId' => 'XsInt'
	);

} 