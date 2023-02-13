<?php


declare(strict_types=1);

namespace Domains\Invoice\Repository;

interface InvoiceItemRepositoryInterface
{
    public function create(array $data);
}
