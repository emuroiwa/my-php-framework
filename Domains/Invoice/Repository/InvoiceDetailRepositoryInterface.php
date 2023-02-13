<?php


declare(strict_types=1);

namespace Domains\Invoice\Repository;

interface InvoiceDetailRepositoryInterface
{
    public function create(array $data);
}
