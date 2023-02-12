<?php


declare(strict_types=1);

namespace Domains\Invoice\Repository;

interface RepositoryInterface
{
    public function create(array $data);
}
