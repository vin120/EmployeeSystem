<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Booking system',
	'language' => 'zh_cn',
	'theme' => 'ace',
	'timezone' => 'Asia/ShangHai',
    'defaultController' => 'login/login', //默认控制器
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.widget.*',
		'application.extensions.mailer.*',
		'application.extensions.phpexcel.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'cache' => array(
            'class' => 'system.caching.CFileCache'
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'login/login' =>  array(
					'login/login/', 
					'urlSuffix'=>'.html', 
					'caseSensitive'=>false
				),
				// '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/db.php'),		//gii only recognise 'db',not 'm_db'
		'm_db'=>require(dirname(__FILE__).'/db.php'),
		// 'm_db'=>require(dirname(__FILE__).'/m_db.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace',
					'categories'=>'system.db.*',
					'showInFireBug'=>true,
					'levels'=>'trace,info,error,warning,xdebug',
				),
				*/
			),
		),

		'session'=>array(
			'autoStart'=>false,
			'cookieParams'=>array('domain'=>'','lifetime'=>21600,'path'=>'/'),
			'cookieMode'=>'allow',
			'timeout'=>21600,
		),


		'mailer' => array(
	      	'class' => 'application.extensions.mailer.EMailer',
	      	'pathViews' => 'application.views.email',
	      	'pathLayouts' => 'application.views.email.layouts',
	   	),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
