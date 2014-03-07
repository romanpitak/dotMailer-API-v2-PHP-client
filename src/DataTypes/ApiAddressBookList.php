<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


class ApiAddressBookList extends JsonArray {

	function getDataClass() {
		return 'ApiAddressBook';
	}

} 