<?php


namespace App\Models;

class User 
{
	protected $full_name;

	protected $email;

	public function setName($name)
	{
		$this->full_name = $name;
	}

	public function getName()
	{
		return $this->full_name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getEmailVariables()
	{
		return [
			'full_name' => $this->full_name,
			'email' => $this->email
		];
	}
}

?>