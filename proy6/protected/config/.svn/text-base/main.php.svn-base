<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

 Yii::app()->theme = 'fashion';
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'TSN engine',
    // preloading 'log' component
    'preload' => array('log', 'maintenanceMode'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.giix-components.*',
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
		'generatorPaths' => array(
			'ext.giix-core', // giix generators
                    
                  
		),
            'password' => '123321',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin',
        'blog',
    ),
    
    
    
    // application components
    'components' => array(
    'facebook'=>array(
    'class' => 'ext.yii-facebook-opengraph.SFacebook',
    'appId'=>'311188215666574', // needed for JS SDK, Social Plugins and PHP SDK
    'secret'=>'9f2a1620f6364510af76d4214e2ed53a', // needed for the PHP SDK
    //'fileUpload'=>false, // needed to support API POST requests which send files
    //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
    //'locale'=>'en_US', // override locale setting (defaults to en_US)
    //'jsSdk'=>true, // don't include JS SDK
    //'async'=>true, // load JS SDK asynchronously
    //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
    //'status'=>true, // JS SDK - check login status
    //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
    //'oauth'=>true,  // JS SDK - enable OAuth 2.0
    //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
    //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
    //'html5'=>true,  // use html5 Social Plugins instead of XFBML
    //'ogTags'=>array(  // set default OG tags
        //'title'=>'MY_WEBSITE_NAME',
        //'description'=>'MY_WEBSITE_DESCRIPTION',
        //'image'=>'URL_TO_WEBSITE_LOGO',
    //),
  ),
        'user' => array(
// enable cookie-based authentication
            'class' => 'application.components.WebUser',
            'allowAutoLogin' => true,
            'autoRenewCookie' => true,
            'identityCookie' => false,
            'loginUrl' => array('/'),
            'StateKeyPrefix' => '_user'
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'admin/' => '/admin/admin/',
//                'page/<url:[\%\+A-Za-z-\d+]+>' => '/page/view/permalink/<url>',
                'page/<url>' => '/page/view/permalink/<url>',
                'blog/posts/index' => '/blog/posts/index',
                'blog/posts/<permalink>' => '/blog/posts/view',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'maintenanceMode' => array(
            'class' => 'application.extensions.MaintenanceMode.MaintenanceMode',
            'message' => 'Sorry this site is temporarily unavailable, work is underway',
            'capUrl' => 'site/MaintenanceMode',
            'urls' => array('admin'),
        ),
        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'mysql:host=netmania.in.ua;dbname=tsn_engine',
            'emulatePrepare' => true,
            'username' => 'tsn_engine',
            'password' => 'ymm4149B',
            'charset' => 'utf8',
            'tablePrefix' => 'tsn_',
            'enableProfiling' => true,
        ),
//        'db' => array(
//            'connectionString' => 'mysql:host=localhost;dbname=tsn_yii_engine',
//            'emulatePrepare' => true,
//            'username' => 'root',
//            'password' => '123321',
//            'charset' => 'utf8',
//            'tablePrefix' => 'tsn_',
//            'enableProfiling' => true,
//        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'enabled' => true,
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
//                array(
//                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                    'ipFilters' => array('127.0.0.1', '192.168.1.215'),
//                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',

        'menus' => array(
                        '_head' => 'Header Menu',
                        'footer_col_1' => 'Footer Column 1',
                        'footer_col_2' => 'Footer Column 2',
                        'footer_col_3' => 'Footer Column 3',
                        'footer_col_4' => 'Footer Column 4',
                        'footer_col_5' => 'Footer Column 5',
                        '_sidebar_block_1' => 'Sidebar Block 1',
                        '_sidebar_block_2' => 'Sidebar Block 2',
                        '_sidebar_block_3' => 'Sidebar Block 3',
                        '_sidebar_block_4' => 'Sidebar Block 4',
                ),
    ),
);
