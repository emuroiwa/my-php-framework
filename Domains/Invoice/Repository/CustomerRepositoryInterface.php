<?php


declare(strict_types=1);

namespace Domains\Invoice\Repository;

interface CustomerRepositoryInterface
{
    public function create(array $data);
}
