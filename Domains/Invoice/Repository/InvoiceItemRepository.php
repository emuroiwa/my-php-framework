<?php

declare(strict_types=1);

namespace Domains\Invoice\Repository;

require 'Domains/Invoice/Repository/InvoiceItemRepositoryInterface.php';
require 'model/InvoiceItemModel.php';

use model\InvoiceItemModel;
use Domains\Invoice\Repository\InvoiceItemRepositoryInterface;
use Ramsey\Uuid\Uuid;

/**
 * InvoiceItemRepository
 */
class InvoiceItemRepository implements InvoiceItemRepositoryInterface
{
    /**
     * db
     *
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        $this->model = new InvoiceItemModel();
    }

    public function create(array $data)
    {
        $uuid = Uuid::uuid1();
        $data['id'] = $uuid->toString();
        return $this->model->save($data);
    }
}
