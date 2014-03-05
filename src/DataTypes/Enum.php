<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api\DataTypes;

abstract class Enum implements IDataType {

	/** @var string */
	protected $valueClass;

	/** @var IDataType */
	protected $value;

	/** @var array  */
	protected $possibleValues;

	public function __construct($value) {
		$valueClass = __NAMESPACE__ . '\\' . $this->valueClass;
		$this->value = new $valueClass($value);
		if (!in_array($this->value, $this->possibleValues, false)) {
			throw new \Exception('Invalid value');
		}
	}

	public function __toString() {
		return (string) $this->value;
	}

	public function toArray() {
		return $this->value->toArray();
	}

	public function toJson() {
		return $this->value->toJson();
	}

}