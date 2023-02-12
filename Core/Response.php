<?php

declare(strict_types=1);

namespace Core;

/**
 * Response
 */
class Response
{
	/*
	* Print log response
	*/
	public static function json(int $statuscode = 200, string $message = 'OK', array $data = []): void
	{
		http_response_code($statuscode);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(['status' => $statuscode, 'message' => $message, 'data' => $data]);
	}
	
}
