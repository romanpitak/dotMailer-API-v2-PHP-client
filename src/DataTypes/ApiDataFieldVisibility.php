<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\DataTypes;

class ApiDataFieldVisibility extends Enum {

	const VISIBLE = 'Private';
	const HIDDEN = 'Public';
	const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

	protected $valueClass = 'XsString';

	protected $possibleValues = array(
		self::VISIBLE,
		self::HIDDEN,
		self::NOT_AVAILABLE_IN_THIS_VERSION
	);

}
