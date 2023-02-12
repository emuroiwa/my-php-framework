<?php

declare(strict_types=1);

namespace Controller;

use Core\Logger\FileLogger;
use Domains\Invoice\Repository\InvoiceRepository;
use Core\Response;
use Domains\Invoice\Validation\InvoiceItemValidation;

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

	private $validation;

	/**
	 * __construct
	 *
	 * @param  InvoiceRepository $invoiceRepository
	 * @return void
	 */
	public function __construct(InvoiceRepository $invoiceRepository, FileLogger $logger, InvoiceItemValidation $validation)
	{
		$this->invoiceRepository = $invoiceRepository;
		$this->logger = $logger;
		$this->validation = $validation;
	}

	/**
	 * create
	 *
	 * @return void
	 */
	public function create()
	{
		$this->logger->log(__METHOD__ . ' : start', 'info');
		$request = json_decode(file_get_contents("php://input"), true);
		if (!empty($this->validation->validate($request))) {
			$this->logger->log(__METHOD__ . ' : Validation error ' . print_r($this->validation->validate($request), true), 'warning');
			Response::json(422, 'Validation error', $this->validation->validate($request));
			return;
		}

		if ($this->invoiceRepository->create($request)) {
			$this->logger->log('Invoice create successfully', 'info');
			Response::json(200, 'success', ['data' => $request]);
		} else {
			$this->logger->log('Invoice failed', 'error');
			Response::json(403, 'failed', []);
		}
	}
}
