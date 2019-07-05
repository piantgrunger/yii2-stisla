[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

YII2 Single Application Template 
=================================
Admin LTE Build in Template in Single YII2 template project
--------------------------------------------------------------


DIRECTORY STRUCTURE
---------------------

-  assets/             contains assets definition
-  commands/           contains console commands (controllers)
-  config/             contains application configurations
-  controllers/        contains Web controller classes
-  mail/               contains view files for e-mails
-  migrations/         contains database migrations
-  models/             contains model classes
-  runtime/            contains files generated during runtime
-  template/           contains  template files for GII and AdminLTE template
-  tests/              contains various tests for the basic application
-  vendor/             contains dependent 3rd-party packages
-  views/              contains view files for the Web application
-  web/                contains the entry script and Web resources

REQUIREMENTS
------------
The minimum requirement by this project template that your Web server supports PHP 5.4.0.

INSTALLATION
---------------


Install via Composer
--------------------

If you do not have Composer, you may install it by following the instructions at getcomposer.org.

You can then install this project template using the following command:

>php composer.phar global require "fxp/composer-asset-plugin:~1.1.0
>
>php composer.phar create-project --prefer-dist --stability=dev piantgrunger/yii2-single-app-template single

CONFIGURATION
--------------
Database
--------

Create a new database and adjust the components['db'] configuration the file config/db.php with real data, for example:

>return [
   > 'class' => 'yii\db\Connection',
   > 'dsn' => 'mysql:host=localhost;dbname=db_coba',
   > 'username' => 'root',
   > 'password' => '1234',
   > 'charset' => 'utf8',
];

Apply migrations with console command
---------------------------------------

yii migrate

Now you should be able to access the application through the following URL, assuming single is the directory directly under the Web root.

http://localhost/single/web/


NOTES:
------

 there is build in user and password in this application : username = admin password = admin1234
Check and edit the other files in the config/ directory to customize your application as required.
Refer to the README in the tests direcotry for information specific to basic application tests.


