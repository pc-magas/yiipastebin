Yii2 Sample pastebin
====================

A plain Paste bin.

To install the database it just execute to the server:

mysql -u [username] -p [dbname] < yii2.sql

After upload the files to the server.

Perhaps you may need to configure ./config/db.php for correcting the database name


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------
You can then access the application through the following URL:

~~~
http://localhost/[subfolder]/web/

where [subfolder] is the subfolder that contains the app 
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.
