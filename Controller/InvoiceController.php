<?php

declare(strict_types=1);

namespace Controller;

use Domains\Invoice\Repository\InvoiceRepository;
use Core\Response;

/**
 * InvoiceController
 */
class InvoiceController
{
	private $invoiceRepository;

	/**
	 * __construct
	 *
	 * @param  InvoiceRepository $invoiceRepository
	 * @return void
	 */
	public function __construct(InvoiceRepository $invoiceRepository)
	{
		$this->invoiceRepository = $invoiceRepository;
	}

	/**
	 * create
	 *
	 * @return void
	 */
	public function create()
	{
		$request_body = json_decode(file_get_contents("php://input"), true);

		if ($this->invoiceRepository->create($request_body)) {
			Response::json(200, 'success', ['data' => $request_body]);
		} else {
			Response::json(403, 'failed', []);
		}
	}
}
