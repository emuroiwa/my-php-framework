<?php

/**
 * InvoiceModel
 */
class InvoiceModel
{

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->DB = DB::getDBInstance();
	}

	/**
	 * __destruct
	 *
	 * @return void
	 */
	public function __destruct()
	{
		DB::closeDB();
	}


}
