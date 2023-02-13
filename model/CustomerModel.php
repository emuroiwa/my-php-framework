<?php

declare(strict_types=1);

namespace model;


use Core\Db;

/**
 * CustomerModel
 */
class CustomerModel
{

	/**
	 * db
	 *
	 * @var mixed
	 */
	private $pdo;


	protected static $table = 'customer';

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
			$stmt = $this->pdo->prepare(
                'INSERT INTO ' . self::$table . ' (id, name, surname, company, street_address, city, state, phone) 
                VALUES (:id, :name, :surname, :company, :street_address, :city, :state, :phone)'
            );
			foreach ($data as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
			}
			$stmt->execute();
			return true;
		} catch (\PDOException $e) {
			throw new \PDOException("Error: " . $e->getMessage());
		}
		return false;
	}
}
