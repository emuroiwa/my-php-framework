<?php
declare(strict_types=1);

namespace Core\Logger;

interface LoggerInterface
{
    public function log(string $message, string $type): void;
}