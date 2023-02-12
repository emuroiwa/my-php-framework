<?php
include_once 'config.php';

/**
 * Autoloading files
 */
class Autoload
{

	/**
	 * loadCore
	 *
	 * @param  string $classname
	 * @return void
	 */
	public static function loadCore(string $classname): void
	{
		$classname = trim($classname);
		$file = 'Core' . DS . $classname . '.php';
		if (is_readable($file)) {
			require_once($file);
		}
	}

	/**
	 * loadModel
	 *
	 * @param  mixed $classname
	 * @return void
	 */
	public static function loadModel(string $classname): void
	{
		$classname = trim($classname);
		$file = 'Model' . DS . $classname . '.php';
		if (is_readable($file))
			require_once($file);
	}

	/**
	 * loadController
	 *
	 * @param  mixed $classname
	 * @return void
	 */
	public static function loadController(string $classname): void
	{
		$classname = trim($classname);
		$file = 'Controller' . DS . $classname . '.php';
		if (is_readable($file)) {
			require_once($file);
		}
	}
}

spl_autoload_register('Autoload::loadCore');
spl_autoload_register('Autoload::loadModel');
spl_autoload_register('Autoload::loadController');
