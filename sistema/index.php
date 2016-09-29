<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$rutaEstado=dirname(__FILE__).'/estado.txt';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//require_once "SOAP/Client.php"; 
require_once($yii);

            $estado=file_get_contents($rutaEstado);
       
            if($estado!=''){
                echo '<script type="text/javascript">';
	    echo "window.location ='varios/siteSuspendido.html'";
	    echo '</script>';
            }

Yii::createWebApplication($config)->run();