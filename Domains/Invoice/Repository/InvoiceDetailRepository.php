<?php

declare(strict_types=1);

namespace Domains\Invoice\Repository;

require 'Domains/Invoice/Repository/InvoiceDetailRepositoryInterface.php';
require 'model/InvoiceDetailModel.php';

use model\InvoiceDetailModel;
use Domains\Invoice\Repository\InvoiceDetailRepositoryInterface;
use Ramsey\Uuid\Uuid;

/**
 * InvoiceDetailRepository
 */
class InvoiceDetailRepository implements InvoiceDetailRepositoryInterface
{
    /**
     * db
     *
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        $this->model = new InvoiceDetailModel();
    }

    public function create(array $data)
    {
        $uuid = Uuid::uuid1();
        $customerId = Uuid::fromString($data['customer_id'])->toString();
        $data['id'] = $uuid->toString();
        $data['customer_id'] = $customerId;
        return $this->model->save($data);
    }
}
