<?php

declare(strict_types=1);

namespace model;

require 'Core/Db.php';

use Core\Db;

/**
 * InvoiceDetailModel
 */
class InvoiceDetailModel
{

	/**
	 * db
	 *
	 * @var mixed
	 */
	private $pdo;
	protected static $table = 'invoice_details';
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		$db = Db::getInstance();
		$this->pdo = $db->getConnection();
	}

	/**
	 * save
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function save(array $data): bool
	{
		try {
			$stmt = $this->pdo->prepare('INSERT INTO ' . self::$table . ' (id, description, taxed, amount) VALUES (:id, :description, :taxed, :amount)');
			foreach ($data as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
			}
			$stmt->execute();
			return true;
		} catch (\PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		return false;
	}
}
