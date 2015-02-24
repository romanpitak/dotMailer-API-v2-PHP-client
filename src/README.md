### [DataTypes](DataTypes)

All data types defined in the
[dotMailer v2 api specification](http://api.dotmailer.com/v2/help/wadl).

### [Resources](Resources)

The Resources object (the big object with all the api methods).

### [Rest](Rest)

The bridge between the 3rd party REST client and the Resources object.

### [Container.php](Container.php)

The access point to the library.
Factory for the Resources objects based on provided credentials.
For multi-account usage,
create a Container with credentials and then loop through them. 
