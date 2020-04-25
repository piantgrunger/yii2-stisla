[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)



YII2 Single Application Template
=================================
STISLA Build in Template in Single YII2 template project
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
-  template/           contains  template files for GII
-  tests/              contains various tests for the basic application
-  vendor/             contains dependent 3rd-party packages
-  views/              contains view files for the Web application
-  web/                contains the entry script and Web resources






## Installation
Clone the repo:
```shell
git clone https://github.com/piantgrunger/yii2-stisla
```

Install composer packages:
```shell
composer global require "fxp/composer-asset-plugin:~1.1"
composer update

```



CONFIGURATION
--------------
Database
--------

Create a new database and adjust the components['db'] configuration the file config/db.php with real data, for example:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=db_coba',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Apply migrations with console command
---------------------------------------

Install composer packages:
```shell
php yii migrate
```
Now you should be able to access the application through the following URL, assuming single is the directory directly under the Web root.

http://localhost/single/web/




NOTES:
------

 there is build in user and password in this application : username = admin password = admin1234
Check and edit the other files in the config/ directory to customize your application as required.
Refer to the README in the tests direcotry for information specific to basic application tests.


### Demo
URL: http://yii2-stisla.alfiannaufal.com

### Credits:
*   [YiiFramework](https://yiiframework)
*   [Stisla Bootstrap 4 Admin Panel Template](https://github.com/stisla/stisla)
*   [yii2-mimin Simple RBAC Manager for Yii2 (minify of yii2-admin)](https://github.com/hscstudio/yii2-mimin)



### How to Contribute

This template is an OpenSource project so your contribution is very welcome.

In order to get started:

- Install this in your local (read installation section)
- Clone this repository.
- Check [README.md](README.md).
- Send [pull requests](https://github.com/piantgrunger/yii2-stisla/pulls).

Aside from contributing via pull requests you may [submit issues](https://github.com/piantgrunger/yii2-stisla/issues).
