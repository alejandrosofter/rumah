<?php
$ruta=dirname(__FILE__).'/base.txt';
$base=file_get_contents($ruta);
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Console Application',
 
    'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.crontab.*',
		 'ext.bootstrap.components.*',
		 'application.modules.auditTrail.models.AuditTrail',
		 'application.modules.rights.*',
		'application.modules.rights.components.*',
		 
		 
		 
		 
	),
 
    // application components
    'components'=>array(
        'db'=>array(
             'class'=>'CDbConnection',
             'charset' => 'utf8',
             'connectionString'=>"mysql:host=localhost;dbname=$base",
             'username'=>'foxis',
             'password'=>'1234'
        ),
                // usefull for generating links in email etc...
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' => FALSE,
            'rules'=>array(),
        ),          
    ),
);