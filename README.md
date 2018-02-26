# Smtp Validator
This package can be used to validate your smtp credentials without sending a test mail

# Package Installation
Require this package in your composer.json file and update composer.

```
composer require samolabams/smtp-validator
```
* If you are on laravel 5.5 and above, thats all you need to do.
* If your laravel version is < 5.5, you'll need to register a service provider and optionally add a facade. Open up config/app and the following to your ```providers``` array:

```
Samolabams\SmtpValidator\SmtpValidatorServceProvider::class,
```
Optionally, you can also use a facade for shorter code:

```
'SmtpValidator' => Samolabams\SmtpValidator\SmtpValidatorFacade::class,
```

# Usage
You can create a new validation with the newValidation method passing your hostname and port(default port is 25) as the parameters, optionally add a username and password, encryption type and validate VOILA!!!.

Use the App container

```
$smtpValidator = App::make('smtp-validator');
$smtpValidator->newValidation($host, $port);
$smtpValidator->validate();
```

Or use the facade
```
SmtpValidator::newValidation($host, $port)->validate();

If you have a smtp username/password and encryption, you can chain them to the validation calls

SmtpValidator::newValidation($host, $port)->setUsername($username)->setPassword($password)->setEncryption($encryption)->validate();
```
Response
```
The validate method returns a response object, with a success property (true/false value) and an optional message property which tells you the reason why your smtp credentials is invalid.

$response = SmtpValidator::newValidation($host, $port)->validate();
if ($response->success === true) {
  // GOOD TO GO!!!
} else {
  // SOMETHING WENT WRONG!!!
  $message = $response->message;
}

```
# Contributing
Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

# License
This Smtp Validator is licensed under the MIT License - see the [LICENSE](LICENSE) file for details