<?php

declare(strict_types=1);

namespace Controller;

use Core\Logger\FileLogger;
use Domains\Invoice\Repository\CustomerRepository;
use Core\Response;
use Domains\Invoice\Validation\CustomerValidation;

/**
 * CustomerController
 */
class CustomerController
{	
	/**
	 * customerRepository
	 *
	 * @var mixed
	 */
	private $customerRepository;
	
	/**
	 * log
	 *
	 * @var mixed
	 */
	private $logger;
	
	/**
	 * validation
	 *
	 * @var mixed
	 */
	private $validation;

	/**
	 * __construct
	 *
	 * @param  CustomerRepository $customerRepository
	 * @param  FileLogger $logger
	 * @param  InvoiceItemValidation $validation
	 * @return void
	 */
	public function __construct(CustomerRepository $customerRepository, FileLogger $logger, CustomerValidation $validation)
	{
		$this->customerRepository = $customerRepository;
		$this->logger = $logger;
		$this->validation = $validation;
	}

	/**
	 * create
	 *
	 * @return void
	 */
	public function create(): void
	{
		$this->logger->log(__METHOD__ . ' : start', 'info');
		$request = json_decode(file_get_contents("php://input"), true);
		if (!empty($this->validation->validate($request))) {
			$this->logger->log(__METHOD__ . ' : Validation error ' . print_r($this->validation->validate($request), true), 'warning');
			Response::json(422, 'Validation error', $this->validation->validate($request));
			return;
		}

		if ($this->customerRepository->create($request)) {
			$this->logger->log('customer create successfully', 'info');
			Response::json(200, 'success', ['data' => $request]);
		} else {
			$this->logger->log('customer failed', 'error');
			Response::json(403, 'failed', []);
		}
	}
}
