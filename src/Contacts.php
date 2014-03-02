<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

final class Contacts extends Service {

	/**
	 * @param int|string $contactId Can be either EMAIL or the dotMailer contact ID
	 */
	public function get($contactId) {
		return $this->execute(sprintf("contacts/%s", $contactId));
	}

	/**
	 * @param bool $withFullData Get contacts also with all the data fields?
	 * @param int $select Get this many contacts
	 * @param int $skip Skip this many contacts from the start.
	 */
	public function getAll($withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		return $this->execute(sprintf("contacts?withFullData=%s&select=%s&skip=%s", $withFullData, $select, $skip));
	}


}