<?php
if (isset($_COOKIE) && isset($_COOKIE['GodMode']) && $_COOKIE['GodMode'] == sha1(date("j.m.Y"))) {
	define('GOD_MODE', TRUE);
} else {
	define('GOD_MODE', TRUE);
}

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE | E_RECOVERABLE_ERROR |
	E_USER_WARNING | E_USER_NOTICE | E_USER_ERROR);

if (GOD_MODE) {
	ini_set('display_errors', 'on');
	define('YII_DEBUG', FALSE);
	//прерывает выполнение экшена, отображает страницу ошибки со стеком
	define('YII_ENABLE_ERROR_HANDLER', TRUE);
	define('YII_ENABLE_EXCEPTION_HANDLER', TRUE);
} else {
	ini_set('display_errors', 'off');
	define('YII_DEBUG', FALSE);
	//отображает страницу нормально при возникновении не критической ошибки, пишет ошибку в лог apache, отображает на странице
	define('YII_ENABLE_ERROR_HANDLER', FALSE);
	define('YII_ENABLE_EXCEPTION_HANDLER', TRUE);
}

// change the following paths if necessary
//$yii=dirname(__FILE__).'/../framework/yii.php';
$yii = dirname(__FILE__) . '/protected/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';

//пользовательский конфиг
require 'config.php';

// specify how many levels of call stack should be shown in each log message
define('YII_TRACE_LEVEL', 100);

require_once($yii);
Yii::createWebApplication($config)->run();
