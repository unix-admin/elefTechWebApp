#

============================
Nick Zorych test task
============================

This project used Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for rapidly creating small projects.

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:~1.0.0"
php composer.phar update
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/
~~~


CONFIGURATION
-------------

### Database
### 1. Create database
### 2. Edit the file `config/db.php` with real data, for example:

```php
  'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=your_database_name',
    'username' => 'your_user_name',
    'password' => 'your_password',
    'charset' => 'utf8',
];
```
### 3.Apply migrations
	
~~~
Command
php yii migrate/up 
~~~
Or execute sql script "database.sql"