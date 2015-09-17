<?php
/**
 * @package romanpitak/dotmailer-api-v2-client
 * @author Roman Piták <roman@pitak.net>
 * @copyright MIT
 */

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/DataTypes/Grammar.php';
require __DIR__ . '/DataTypes/EnumTest.php';

global $wadlData;
$wadlData = file_get_contents(__DIR__ . '/../api_wadl.xml');
