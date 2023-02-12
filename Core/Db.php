<?php

// Singleton pattern, ensuring that there is only one instance of the class that can be used to connect to the database. 
// The getInstance method creates the instance of the class if it doesn't exist and returns it, otherwise it returns the existing instance.
// The getConnection method returns the PDO instance that is used to communicate with the database.

/**
 * Db
 */

declare(strict_types=1);

namespace Core;

use PDO;

class Db
{
	private static $instance = null;
	private $pdo;

	private function __construct()
	{
		$dsn = 'mysql:host=' . DB['SERVER'] . ':' . DB['PORT'] . ';dbname=' . DB['DATABASE'];
		$this->pdo = new PDO($dsn, DB['USER'], DB['PASSWORD']);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * getInstance
	 *
	 * @return void
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new Db();
		}

		return self::$instance;
	}
	
	/**
	 * getConnection
	 *
	 * @return void
	 */
	public function getConnection()
	{
		return $this->pdo;
	}
}
