<?php

declare(strict_types=1);

namespace Controller;

use Core\Logger\FileLogger;
use Domains\Invoice\Repository\InvoiceRepository;
use Core\Response;

/**
 * InvoiceController
 */
class InvoiceController
{	
	/**
	 * invoiceRepository
	 *
	 * @var mixed
	 */
	private $invoiceRepository;
	
	/**
	 * log
	 *
	 * @var mixed
	 */
	private $logger;

	/**
	 * __construct
	 *
	 * @param  InvoiceRepository $invoiceRepository
	 * @return void
	 */
	public function __construct(InvoiceRepository $invoiceRepository, FileLogger $logger)
	{
		$this->invoiceRepository = $invoiceRepository;
		$this->logger = $logger;
	}

	/**
	 * create
	 *
	 * @return void
	 */
	public function create()
	{
		$this->logger->log(__METHOD__ . ' : start', 'info');
		$request_body = json_decode(file_get_contents("php://input"), true);

		if ($this->invoiceRepository->create($request_body)) {
			$this->logger->log('Invoice create successfully', 'info');
			Response::json(200, 'success', ['data' => $request_body]);
		} else {
			$this->logger->log('Invoice failed', 'error');
			Response::json(403, 'failed', []);
		}
	}
}
