<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiTransactionalDataImportFaultReason extends Enum
{

    const UNKNOWN = 'Unknown';
    const INVALID_CLIENT_KEY = 'InvalidClientKey';
    const INVALID_CONTACT_IDENTIFIER = 'InvalidContactIdentifier';
    const INVALID_JSON = 'InvalidJson';
    const DUPLICATE_KEY = 'DuplicateKey';
    const CONTACT_DOES_NOT_EXIST = 'ContactIdDoesNotExist';
    const CONTACT_EMAIL_DOES_NOT_EXIST = 'ContactEmailDoesNotExist';
    const JSON_KEY_TOO_LONG = 'JsonKeyTooLong';
    const JSON_KEY_INVALID_CHARACTERS = 'JsonKeyInvalidCharacters';
    const JSON_NUMBER_VALUE_TOO_LARGE = 'JsonNumberValueTooLarge';
    const JSON_VALUE_TOO_LONG = 'JsonValueTooLong';
    const JSON_VALUE_INCOMPATIBLE_WITH_SCHEMA = 'JsonValueIncompatibleWithSchema';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::UNKNOWN,
            self::INVALID_CLIENT_KEY,
            self::INVALID_CONTACT_IDENTIFIER,
            self::INVALID_JSON,
            self::DUPLICATE_KEY,
            self::CONTACT_DOES_NOT_EXIST,
            self::CONTACT_EMAIL_DOES_NOT_EXIST,
            self::JSON_KEY_TOO_LONG,
            self::JSON_KEY_INVALID_CHARACTERS,
            self::JSON_NUMBER_VALUE_TOO_LARGE,
            self::JSON_VALUE_TOO_LONG,
            self::JSON_VALUE_INCOMPATIBLE_WITH_SCHEMA,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
