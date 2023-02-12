<?php
declare(strict_types=1);

namespace Core\Logger;

require 'Core/Logger/LoggerInterface.php';
use Core\Logger\LoggerInterface;

class FileLogger implements LoggerInterface
{
    public function log(string $message, string $type): void
    {
        $log = date('Y-m-d H:i:s') . ": $message\n";
        $logPath = "storage/logs/$type.txt";
        file_put_contents($logPath, $log, FILE_APPEND);
    }
}