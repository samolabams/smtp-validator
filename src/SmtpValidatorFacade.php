<?php

namespace Samolabams\SmtpValidator;

use Illuminate\Support\Facades\Facade;

/**
* This is class is part of SMTP Validator Package
*
* @license MIT
* @package Samolabams\SmtpValidator
* @author Samolabams
*/
class SmtpValidatorFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'smtp-validator';
	}
}