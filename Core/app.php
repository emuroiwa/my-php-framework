<?php
declare(strict_types=1);
namespace Core;

require 'Core/Container.php';
require 'Controller/InvoiceItemController.php';
require 'Controller/InvoiceDetailsController.php';
require 'Controller/CustomerController.php';
require 'Domains/Invoice/Repository/InvoiceItemRepository.php';
require 'Domains/Invoice/Repository/CustomerRepository.php';
require 'Core/Logger/FileLogger.php';
require 'Domains/Invoice/Validation/InvoiceItemValidation.php';
require 'Domains/Invoice/Validation/InvoiceDetailValidation.php';
require 'Domains/Invoice/Validation/CustomerValidation.php';

use Controller\InvoiceItemController;
use Controller\InvoiceDetailsController;
use Controller\CustomerController;
use Core\Logger\FileLogger;
use Domains\Invoice\Repository\CustomerRepository;
use Domains\Invoice\Repository\InvoiceItemRepository;
use Domains\Invoice\Validation\CustomerValidation;
use Domains\Invoice\Validation\InvoiceItemValidation;

// create container instance
$container = new Container();

// setting dependences
$container->set('invoice_item_repository', function () {
    return new InvoiceItemRepository();
});
$container->set('logger', function () {
    return new FileLogger();
});
$container->set('invoice_item_validation', function () {
    return new InvoiceItemValidation();
});
$container->set('customer_validation', function () {
    return new CustomerValidation();
});
$container->set('invoice_detail_validation', function () {
    return new InvoiceItemValidation();
});
$container->set('invoice_detail_repository', function () {
    return new InvoiceItemRepository();
});
$container->set('customer_repository', function () {
    return new CustomerRepository();
});


$container->set('InvoiceItemController', function () use ($container) {
    return new InvoiceItemController($container->get('invoice_item_repository'), $container->get('logger'), $container->get('invoice_item_validation'));
});

$container->set('InvoiceDetailController', function () use ($container) {
    return new InvoiceDetailsController($container->get('invoice_detail_repository'), $container->get('logger'), $container->get('invoice_item_validation'));
});

$container->set('CustomerController', function () use ($container) {
    return new CustomerController($container->get('customer_repository'), $container->get('logger'), $container->get('customer_validation'));
});