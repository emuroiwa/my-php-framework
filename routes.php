<?php


$route->addRoute('POST', '/customer', ['CustomerController', 'create']);
$route->addRoute('POST', '/invoice-details', ['InvoiceDetailsController', 'create']);
$route->addRoute('POST', '/invoice-item', ['InvoiceItemController', 'create']);
