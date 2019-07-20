<?php

use \kartik\datecontrol\Module;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'Template',
    'name' => 'Application',
    // set target language to be Indonesia
  'language' => 'id-ID',
    'as access' => [
     'class' => '\hscstudio\mimin\components\AccessControl',
     'allowActions' => [
        // add wildcard allowed action here!
       // 'site/*',
        'debug/*',
        'mimin/*', // only in dev mode
    ],
],


   'modules' => [
        'datecontrol' =>  [
        'class' => 'kartik\datecontrol\Module',

        // format settings for displaying each date attribute (ICU format example)
        'displaySettings' => [
            Module::FORMAT_DATE => 'dd-MM-yyyy',
            Module::FORMAT_TIME => 'hh:mm:ss a',
            Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
        ],

        // format settings for saving each date attribute (PHP format example)
        'saveSettings' => [
            Module::FORMAT_DATE => 'yyyy-MM-dd', // saves as unix timestamp
            Module::FORMAT_TIME => 'php:H:i:s',
            Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
        ],

        // set your display timezone
        'displayTimezone' => 'Asia/Jakarta',

        // set your timezone for date saved to db
        'saveTimezone' => 'UTC',

        // automatically use kartik\widgets for each of the above formats
        'autoWidget' => true,

        // default settings for each widget from kartik\widgets used when autoWidget is true
        'autoWidgetSettings' => [
            Module::FORMAT_DATE => ['type'=>2, 'pluginOptions'=>['autoclose'=>true]], // example
            Module::FORMAT_DATETIME => [], // setup if needed
            Module::FORMAT_TIME => [], // setup if needed
        ],

        // custom widget settings that will be used to render the date input instead of kartik\widgets,
        // this will be used when autoWidget is set to false at module or widget level.
        'widgetSettings' => [
            Module::FORMAT_DATE => [
                'class' => 'yii\jui\DatePicker', // example
                'options' => [
                    'dateFormat' => 'php:d-M-Y',
                    'options' => ['class'=>'form-control'],
                ]
            ]
       ]
    ],


   'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to
        // use your own export download action or custom translation
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
     'mimin' => [
        'class' => '\hscstudio\mimin\Module',
    ],

   ],

  // set source language to be English
  'sourceLanguage' => 'en-US',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [


       'authManager' => [
        'class' => 'yii\rbac\DbManager', // only support DbManager
    ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'y2B_PhmMeo1G4hPY0dO7KfNled31dl6L',

        ],
        /*
        'view' => [
          'theme' => [
              'pathMap' => [
                 '@app/views' => '@app/templates/views'
           ],
         ],
        ],
*/
        'urlManager' => [
       'class' => 'yii\web\UrlManager',
       // Hide index.php
       'showScriptName' => false,
       // Use pretty URLs
       'enablePrettyUrl' => true,
       'rules' => [
       ],
   ],
      'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            //'enableAutoLogin' => true,
            'enableSession' => true,
            'authTimeout' => 60*30,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
			/*
			// if using Gmail
			// turn on at less secure apps
			// https://www.google.com/settings/security/lesssecureapps
			// please set in params.php too
			'viewPath' => '@app/mail',
			'transport'=>[
				'class'=>'Swift_SmtpTransport',
				'host'=>'smtp.gmail.com',
				'username'=>'youremail@gmail.com',
				'password'=>'your password',
				'port'=>'587',
				'encryption'=>'tls',
			],
			*/
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
        'myCrud' => [
            'class' => 'app\templates\crud\Generator',
            'templates' => [
                'my' => '@app/Templates/crud/default',
            ]
        ],
        
    ],
    ];
}

return $config;
