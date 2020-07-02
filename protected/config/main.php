<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'One Moment',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.models.behaviors.*',
		'zii.behaviors.CTimestampBehavior',
		'application.extensions.yiidebugtb.*',
		'application.extensions.NestedSetBehavior.*',
		'application.extensions.shoppingCart.*',
		'application.components.widgets.ProductRating.*',
		'application.components.widgets.SpecialOffer.*',
		'application.components.widgets.SeeAlso.*',
		'application.components.widgets.NewsBlock.*',
		//'application.extensions.phpexcel.PHPExcel'
	),

	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => '0123456',
			'ipFilters' => array('*'),
		),
	),

	// application components
	'components'=>array(
                'user' => array(
                    'class' => 'WebUser',
                    //enable cookie-based authentication
                    'allowAutoLogin' => TRUE,
                ),
                'authManager' => array(
                    'class' => 'PhpAuthManager',
                    'defaultRoles' => array(0),
                ),
                'urlManager'=>array(
                        'class'=>'UrlManager',
                        'urlFormat' => 'path',
                        'showScriptName' => FALSE,
                        //'urlSuffix' => К_СУФФИКС_СТРАНИЦЫ,
                        'rules' => array(
                                        /*'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
                                        'category/<slug>' => 'category/view',
                                        'album/<slug>' => 'album/view',
                                        'service/<slug>' => 'service/view',
                                        '/cp' => 'cp/admin/index',
                                        '/gii' => 'gii',
                                        //'<slug>' => 'site/urlForwarder'
                        ),
		),
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/yvshop.db',
			'enableParamLogging' => TRUE, //show parameters values
			'enableProfiling' => TRUE, //enable SQL profiler
		),*/
                'db'=>array(
                    'class'=>'CDbConnection',
                    'connectionString'=>'mysql:host=localhost;dbname=petya163_sarcast',
                    'charset'=>'utf8',
                    'username'=>'petya163_sarcast',
                    'password'=>'moloko@2',
                    //'emulatePrepare'=>true,  // needed by some MySQL installations
                ),
		'errorHandler'=>array(
			//'class' => 'ext.improvedErrorHandler.EImprovedErrorHandler',
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'shoppingCart' => array(
			'class' => 'ext.shoppingCart.EShoppingCart',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class' => 'XWebDebugRouter',
					'config' => 'alignRight, opaque, runInDebug, fixedPos, yamlStyle',
					'levels' => 'error, warning, trace, profile, info'
				),
				//SQL profiler
				array(
					'class' => 'CProfileLogRoute',
					'enabled' => GOD_MODE,
					'report' => 'summary'
				),
				//show log messages on web pages
				array(
					'class' => 'CWebLogRoute',
					'levels' => 'error, warning, info',
					'enabled' => GOD_MODE
				)
			),
		),
	),
	'sourceLanguage' => 'code',
	'language' => 'ru',
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'			=> К_ЕМЭЙЛ_АДМИНИСТРАТОРА,
		'shopManagerEmail'		=> К_ЕМЭЙЛ_МЕНЕДЖЕРА,
		'productImagesWebDir'	=> '/up/i/product/',
		'productImagesSysDir'	=> dirname(__FILE__) . '/../../up/i/product/',
		'sliderImagesWebDir'	=> '/up/i/slider/',
		'sliderImagesSysDir'	=> dirname(__FILE__) . '/../../up/i/slider/',
		'albumImagesWebDir'	=> '/up/i/album/',
		'albumImagesSysDir'	=> dirname(__FILE__) . '/../../up/i/album/',
		'serviceImagesWebDir'	=> '/up/i/service/',
		'serviceImagesSysDir'	=> dirname(__FILE__) . '/../../up/i/service/',
		'exportWebDir'			=> '/up/export/',
		'exportSysDir'			=> dirname(__FILE__) . '/../../up/export/',
		'productsPerPage'		=> 20,
		'translatedLanguages'=>array(
			'ru'=>'Russian',
			'en'=>'English',
		),
		'defaultLanguage'=>'ru',
	),
);
