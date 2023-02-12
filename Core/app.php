<?php
declare(strict_types=1);
namespace Core;

require 'Core/Container.php';
require 'Controller/InvoiceController.php';
require 'Domains/Invoice/Repository/InvoiceRepository.php';
require 'Core/Logger/FileLogger.php';

use Controller\InvoiceController;
use Core\Logger\FileLogger;
use Domains\Invoice\Repository\InvoiceRepository;

// create container instance
$container = new Container();
$container->set('InvoiceRepository', function () {
    return new InvoiceRepository();
});

// setting dependences
$container->set('invoice_repository', function () {
    return new InvoiceRepository();
});
$container->set('logger', function () {
    return new FileLogger();
});
$container->set('InvoiceController', function () use ($container) {
    return new InvoiceController($container->get('invoice_repository'), $container->get('logger'));
});