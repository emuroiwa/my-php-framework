<?php

declare(strict_types=1);

namespace Domains\Invoice\Repository;

class Invoice
{
    /**
	 * invoice
	 *
	 * @var mixed
	 */
	private $invoiceRepository;
		
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct(RepositoryInterface $invoiceRepository)
	{
		$this->invoiceRepository = $invoiceRepository;
	}

    

}
