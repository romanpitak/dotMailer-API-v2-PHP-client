<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiAccountPropertyList extends JsonArray {

	function getDataClass() {
		return 'ApiAccountProperty';
	}

}