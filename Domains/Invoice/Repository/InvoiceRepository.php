<?php

declare(strict_types=1);

namespace Domains\Invoice\Repository;

require 'Domains/Invoice/Repository/RepositoryInterface.php';
require 'Core/Db.php';

use Core\Db;
use Domains\Invoice\Repository\RepositoryInterface;
use Ramsey\Uuid\Uuid;

/**
 * InvoiceRepository
 */
class InvoiceRepository implements RepositoryInterface
{
    /**
     * db
     *
     * @var mixed
     */
    private $pdo;

    public function __construct()
    {
        $db = Db::getInstance();
        $this->pdo = $db->getConnection();
    }

    public function create(array $data)
    {
        try {
            $uuid = Uuid::uuid1();
            $data['id'] = $uuid->toString();
            $stmt = $this->pdo->prepare('INSERT INTO invoice_items (id, description, taxed, amount) VALUES (:id, :description, :taxed, :amount)');
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
