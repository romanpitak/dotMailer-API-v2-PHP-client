<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

final class AddressBooks extends Service {

	public function create($name, $public = false) {
		$visibility = $public ? 'Public' : 'Private';
		return $this->execute(array('address-books', 'POST', "{Name:'$name',Visibility:'$visibility'}"));
	}

	public function deleteAllContactsFrom($addressBookId) {
		return $this->execute(array(sprintf("address-books/%s/contacts", $addressBookId), 'DELETE'));
	}

	public function get($addressBookId) {
		return $this->execute(sprintf("address-books/%s", $addressBookId));
	}

	/**
	 * @param int $select Get this many address books
	 * @param int $skip Skip this many address books from the start
	 * @return mixed
	 */
	public function getAll($select = 1000, $skip = 0) {
		return $this->execute(sprintf("address-books?select=%s&skip=%s", $select, $skip));
	}

}
