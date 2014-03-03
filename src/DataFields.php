<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api;

final class DataFields extends Service {

	const STRING_TYPE = 'String';
	const NUMERIC_TYPE = 'Numeric';
	const DATE_TYPE = 'Date';
	const BOOLEAN_TYPE = 'Boolean';

	/**
	 * Creates a data field within the account.
	 *
	 * @param string $name
	 * @param string $type one of DataFields::[STRING_TYPE, NUMERIC_TYPE, DATE_TYPE, BOOLEAN_TYPE]
	 * @param bool $public Visibility
	 * @param null $defaultValue
	 * @return mixed
	 */
	public function create($name, $type, $public = false, $defaultValue = null) {
		$visibility = $public ? 'Public' : 'Private';
		$data = array(
			'Name' => $name,
			'Type' => $type,
			'Visibility' => $visibility
		);
		if (!is_null($defaultValue)) {
			$data['DefaultValue'] = $defaultValue;
		}

		return $this->execute(array('data-fields', 'POST', json_encode($data)));
	}

	/**
	 * Deletes a data field within the account.
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function delete($name) {
		return $this->execute(array(sprintf("data-fields/%s", $name), 'DELETE'));
	}

	/**
	 * Lists the data fields within the account.
	 *
	 * @return mixed
	 */
	public function getAll() {
		return $this->execute('data-fields');
	}

}

