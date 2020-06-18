<?php
/**
 * Yii bootstrap file.
 *
 * @author Vitaly Goncharuk
 */

require(dirname(__FILE__).'/../framework/YiiBase.php');

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It encapsulates {@link YiiBase} which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of YiiBase.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: yii.php 1678 2010-01-07 21:02:00Z qiang.xue $
 * @package system
 * @since 1.0
 */
class Yii extends YiiBase {

	/**
	 * Class autoload loader.
	 * This method is provided to be invoked within an __autoload() magic method.
	 * @param string class name
	 * @return boolean whether the class has been loaded successfully
	 */
	public static function autoload($className) {
		if (strpos($className, 'PHPExcel') !== FALSE) {
			if (!defined('PHPEXCEL_ROOT')) {
				define('PHPEXCEL_ROOT', Yii::app()->basePath.'/extensions/phpexcel/');
			}
			$pObjectName = $className;
			if ((class_exists($pObjectName)) || (strpos($pObjectName, 'PHPExcel') === False)) {
			return false;
			}

			$pObjectFilePath =	PHPEXCEL_ROOT.
								str_replace('_',DIRECTORY_SEPARATOR,$pObjectName).
								'.php';

			if ((file_exists($pObjectFilePath) === false) || (is_readable($pObjectFilePath) === false)) {
				return false;
			}

			require($pObjectFilePath);
			return true;
		} else {
			parent::autoload($className);
		}
	}
	
	/**
	 * Registers a new class autoloader.
	 * The new autoloader will be placed before {@link autoload} and after
	 * any other existing autoloaders.
	 * @param callback a valid PHP callback (function name or array($className,$methodName)).
	 * @since 1.0.10
	 */
	public static function registerAutoloader($callback) {
		spl_autoload_unregister(array('Yii','autoload'));
		spl_autoload_register($callback);
		spl_autoload_register(array('Yii','autoload'));
	}
	
}

spl_autoload_register(array('Yii','autoload'));