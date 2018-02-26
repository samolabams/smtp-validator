<?php

namespace Samolabams\SmtpValidator;

use Illuminate\Support\ServiceProvider;

/**
* This is class is part of SMTP Validator Package
*
* @license MIT
* @package Samolabams\SmtpValidator
* @author Samolabams
*/
class SmtpValidatorServiceProvider extends ServiceProvider
{
	protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('smtp-validator', function () {
			return new SmtpValidator;
		});

        $this->app->alias('smtp-validator', 'Samolabams\SmtpValidator\SmtpValidator');
    }

    public function provides()
    {
    	return [SmtpValidator::class];
    }
}
