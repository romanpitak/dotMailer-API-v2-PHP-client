<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

abstract class JsonArray extends MagicArray {

	protected $dataClass;

	/*
	 * ========== MagicArray ==========
	 */

	function offsetIsAllowed($offset) {
		return (is_null($offset) || (((string)(int)$offset) == $offset) || is_int($offset));
	}

	function convertOffset($offset) {
		return is_null($offset) ? null : (int) $offset;
	}

	function convertValue($value, $offset = null) {
		$dataClass = __NAMESPACE__ . '\\' . $this->dataClass;
		return new $dataClass($value);
	}


	/*
	 * ========== IDataType ==========
	 */

	function toJson() {
		$contents = array();
		foreach ($this->data as $value) {
			$contents[] = $value->toJson();
		}
		return sprintf("[%s]", implode(",", $contents));
	}

}