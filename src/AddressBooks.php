<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

use DotMailer\Api\DataTypes\ApiAddressBook;
use DotMailer\Api\DataTypes\ApiAddressBookList;
use DotMailer\Api\DataTypes\XsInt;

final class AddressBooks extends Service {

	/**
	 * @param string $name
	 * @param bool $public
	 * @return ApiAddressBook
	 */
	public function create($name, $public = false) {
		$visibility = $public ? 'Public' : 'Private';
		return new ApiAddressBook($this->execute(array('address-books', 'POST', "{Name:'$name',Visibility:'$visibility'}")));
	}

	/**
	 * Deletes an address book.
	 *
	 * @param int|XsInt $addressBookId
	 */
	public function delete($addressBookId) {
		$this->execute(array(sprintf("address-books/%s", $addressBookId), 'DELETE'));
	}

	public function deleteAllContactsFrom($addressBookId) {
		return $this->execute(array(sprintf("address-books/%s/contacts", $addressBookId), 'DELETE'));
	}

	public function get($addressBookId) {
		return $this->execute(sprintf("address-books/%s", $addressBookId));
	}

	/**
	 * Gets all address books
	 *
	 * @param int $select Get this many address books
	 * @param int $skip Skip this many address books from the start
	 * @return mixed
	 */
	public function getAll($select = 1000, $skip = 0) {
		return new ApiAddressBookList($this->execute(sprintf("address-books?select=%s&skip=%s", $select, $skip)));
	}

}
