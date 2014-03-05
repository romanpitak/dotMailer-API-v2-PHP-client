<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api;

use DotMailer\Api\DataTypes\ApiDataField;
use DotMailer\Api\DataTypes\ApiDataFieldList;
use DotMailer\Api\DataTypes\ApiDataTypes;
use DotMailer\Api\DataTypes\ApiDependencyResult;

final class DataFields extends Service {

	const STRING_TYPE = ApiDataTypes::STRING;
	const NUMERIC_TYPE = ApiDataTypes::NUMERIC;
	const DATE_TYPE = ApiDataTypes::DATE;
	const BOOLEAN_TYPE = ApiDataTypes::BOOLEAN;

	/**
	 * Creates a data field within the account.
	 *
	 * @param string $name
	 * @param string $type one of DataFields::[STRING_TYPE, NUMERIC_TYPE, DATE_TYPE, BOOLEAN_TYPE]
	 * @param bool $public Visibility
	 * @param null $defaultValue
	 * @return ApiDataField
	 */
	public function create($name, $type, $public = false, $defaultValue = null) {
		$apiDataField = new ApiDataField();
		$apiDataField->name = $name;
		$apiDataField->type = $type;
		$apiDataField->visibility = $public ? 'Public' : 'Private';
		$apiDataField->defaultValue = $defaultValue;
		return new ApiDataField($this->execute(array('data-fields', 'POST', $apiDataField->toJson())));
	}

	/**
	 * Deletes a data field within the account.
	 *
	 * @param string $name
	 * @return ApiDependencyResult
	 */
	public function delete($name) {
		return new ApiDependencyResult($this->execute(array(sprintf("data-fields/%s", $name), 'DELETE')));
	}

	/**
	 * Lists the data fields within the account.
	 *
	 * @return ApiDataFieldList
	 */
	public function getAll() {
		return new ApiDataFieldList($this->execute('data-fields'));
	}

}

