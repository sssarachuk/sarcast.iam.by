<?php

class Utilities {

	/**
	 * var_dump method is a print_r wrapper for print_r
	 * @param var - object, array or primitive to print_r and echo/return
	 * @return string - string representaion of the object
	 */
	public static function var_dump($var) {
		CVarDumper::dump($var, 10, TRUE);
	}

	public static function collectObjectsVars($objects, $var = 'id', $callback=null) {
		$vars = array();
		foreach ($objects as $o) {
			if (!$callback) {
				$vars[] = $o->$var;
			} else {
				if ($callback($o)) {
					$vars[] = $o->$var;
				}
			}
		}
		return $vars;
	}

}