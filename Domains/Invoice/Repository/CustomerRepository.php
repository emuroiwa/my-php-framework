<?php

declare(strict_types=1);

namespace Domains\Invoice\Repository;

require 'Domains/Invoice/Repository/CustomerRepositoryInterface.php';
require 'model/CustomerModel.php';

use model\CustomerModel;
use Domains\Invoice\Repository\CustomerRepositoryInterface;
use Ramsey\Uuid\Uuid;

/**
 * CustomerRepository
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * db
     *
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        $this->model = new CustomerModel();
    }

    public function create(array $data)
    {
        $uuid = Uuid::uuid1();
        $data['id'] = $uuid->toString();
        return $this->model->save($data);
    }
}
