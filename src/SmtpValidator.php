<?php
namespace Samolabams\SmtpValidator;

use Swift_SmtpTransport as SmtpTransport;
use Swift_TransportException as SwiftTransportException;
use Exception;

/**
* This is the main SMTP Validator class
*
* @license MIT
* @package Samolabams\SmtpValidator
* @author Samolabams
*/
class SmtpValidator
{
	private $response;
	private $host = null;
	private $port = null;
	private $username = null;
	private $password = null;
	private $encryption = null;
	const DEFAULT_PORT = 25;

	/**
	* Create a new Validation
	*
	* @param string $host
	* @param int $port
	* @return $this
	*/
	public function newValidation($host, $port=self::DEFAULT_PORT)
	{
		$this->host = $host;
		$this->port = $port;

		return $this;
	}

	/**
	* Set the username
	*
	* @param string $username
	* @return $this
	*/
	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	/**
	* Set the password
	*
	* @param string $password
	* @return $this
	*/
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	/**
	* Set the encryption type
	*
	* @param string $encryption
	* @return $this
	*/
	public function setEncryption($encryption)
	{
		$this->encryption = $encryption;
		return $this;
	}

	/**
	* Validate SMTP credebtials
	*
	* @throws \SwiftTransportException
	* @throws \Exception
	* @return Samolabams\SmtpValidator\Response
	*/
	public function validate()
	{
		if (is_null($this->host)) {
			throw new Exception("Host has not been set");
		}
		if (is_null($this->port)) {
			throw new Exception("Port has not been set");
		}

		$transport = new SmtpTransport($this->host, $this->port);

		if ($this->encryption != null) {
			$transport->setEncryption($this->encryption);
		}

		if ($this->username != null && $this->password != null) {
			$transport->setUsername($this->username);
			$transport->setPassword($this->password);
		}

		$response = new Response;

		try {
			$transport->start();
			$transport->stop();
			$response->set(true, 'OK');
		} catch(SwiftTransportException $e) {
			$response->set(false, $e->getMessage());
		} catch(Exception $e) {
			$response->set(false, $e->getMessage());
		}

		return $response->get();
	}
}