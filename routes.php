<?php


$route->addRoute('POST', '/customer', ['CustomerController', 'create']);
$route->addRoute('POST', '/invoice-details', ['InvoiceDetailController', 'create']);
$route->addRoute('POST', '/invoice-item', ['InvoiceItemController', 'create']);
