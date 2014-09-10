# dotMailer API v2 PHP client
(c) 2014 Roman Piták, http://pitak.net <roman@pitak.net>

PHP client library for the dotMailer v2 (REST) API with **multiple accounts support!**

**Full implementation** according to the http://api.dotmailer.com/v2/help/wadl

Type hinting support for objects and resources (not yet for arrays).

## Installation
The best way to install is to use the [Composer](https://getcomposer.org/) dependency manager.

    php composer.phar require romanpitak/dotmailer-api-v2-client

## Usage
### Single account usage

	<?php

	    require_once('vendor/autoload.php');

		$credentials = array(
			Container::USERNAME =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
			Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
		);

		$resources = Container::newResources($credentials);

		echo $resources->GetAccountInfo();

	?>

### Multiple accounts usage

	<?php

	    require_once('vendor/autoload.php');

		$credentials = array(
			'master' => array(
				Container::USERNAME =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
				Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
			),
			'group1' => array(
				'g1-account1' => array(
					Container::USERNAME =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
					Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
				),
				'g1-account2' => array(
					Container::USERNAME =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
					Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
				)
			)
		);

		$container = Container::newContainer($credentials);

		echo $container->getResources('master')->GetSegments();

		$dataField = new ApiDataField();
		$dataField->name = 'MY_DATA_FIELD';
		$dataField->type = ApiDataTypes::STRING;
		$dataField->visibility = ApiDataFieldVisibility::HIDDEN;

		foreach ($container->group1 as $resources) {
			try {
				$resources->PostDataFields($dataField);
				echo 'OK';
			} catch (Exception $e) {
				echo 'Already exists';
			}
		}

	?>

TODO
----

Refactor Simple data types

Split IResources into sub-interfaces

Interfaces for data types