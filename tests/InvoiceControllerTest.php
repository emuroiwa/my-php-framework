<?php
declare(strict_types=1);

namespace tests;
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Controller\InvoiceController;
use Core\Logger\FileLogger;
use Domains\Invoice\Repository\InvoiceRepository;
use Domains\Invoice\Validation\InvoiceItemValidation;

class InvoiceControllerTest extends TestCase
{
	private $invoiceController;
	private $invoiceRepositoryMock;
	private $loggerMock;
	private $validationMock;

	public function setUp()
	{
		$this->invoiceRepositoryMock = $this->createMock(InvoiceRepository::class);
		$this->loggerMock = $this->createMock(FileLogger::class);
		$this->validationMock = $this->createMock(InvoiceItemValidation::class);

		$this->invoiceController = new InvoiceController(
			$this->invoiceRepositoryMock,
			$this->loggerMock,
			$this->validationMock
		);
	}

	public function testCreateSuccess()
	{
		$this->validationMock->method('validate')
			->willReturn([]);

		$this->invoiceRepositoryMock->method('create')
			->willReturn(true);

		$this->invoiceController->create();

		$this->assertEquals(200, http_response_code());
	}

	public function testCreateFailed()
	{
		$this->validationMock->method('validate')
			->willReturn([]);

		$this->invoiceRepositoryMock->method('create')
			->willReturn(false);

		$this->invoiceController->create();

		$this->assertEquals(403, http_response_code());
	}

	public function testCreateValidationFailed()
	{
		$this->validationMock->method('validate')
			->willReturn(['error' => 'Validation error']);

		$this->invoiceController->create();

		$this->assertEquals(422, http_response_code());
	}
}
