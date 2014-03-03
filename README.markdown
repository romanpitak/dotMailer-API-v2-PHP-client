dotMailer API v2 PHP client
===============
(c) 2014 Roman Piták, http://pitak.net <roman@pitak.net>

PHP client library for the dotMailer v2 (REST) API with **MULTIPLE ACCOUNTS SUPPORT!**

Basic Usage
-----------

	<?php

		/*
		 * ========== single account usage ==========
		 */

		$credentials = array(
			'username' =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
			'password' => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
		);

		$account = Container::newAccount($credentials);

		echo $account->getInfo();


		/*
		 * ========== MULTIPLE ACCOUNTS usage ==========
		 */

		$credentials = array(
			'master' => array(
				'username' =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
				'password' => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
			),
			'group1' => array(
				'g1-account1' => array(
					'username' =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
					'password' => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
				),
				'g1-account2' => array(
					'username' =>  'apiuser-XXXXXXXXXXXX@apiconnector.com',
					'password' => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
				)
			)
		);

		$container = Container::newContainer($credentials);

		echo $container->master->contacts->getAll();

		foreach ($container->group1 as $account) {
			echo $account->dataFields->create('MY_DATA_FIELD');
		}

	?>


TODO
----
solve output formats

	strings
	arrays
	data classes

add custom exceptions

solve error codes in RestClient




