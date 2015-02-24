# REST client bridge

This directory contains the bridge between the 3rd party REST client
(from [/composer.json](../../composer.json))
and the
[Resources](../Resources/Resources.php)
class.
You can use any REST client of your choosing.
All you have to do is write a bridge class
implementing the
[IClient](IClient.php)
interface
and specify it in the
[Container.php](../Container.php)
class.

This REST client is then passed by the Container (Resources factory)
to the Resources instance.

### [Client.php](Client.php)

The bridge class.

### [IClient.php](IClient.php)

The bridge interface. 
