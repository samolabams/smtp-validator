<?php

namespace Samolabams\SmtpValidator;

/**
* This is class is part of SMTP Validator Package
*
* @license MIT
* @package Samolabams\SmtpValidator
* @author Samolabams
*/
class Response
{
	private $success;
	private $message;

	public function set($success, $message = null)
	{
		$this->success = $success;
		$this->message = $message;
	}

	public function get()
	{
		$response = new \StdClass;
		$response->success = $this->success;
		$response->message = $this->message;

		return $response;
	}
}