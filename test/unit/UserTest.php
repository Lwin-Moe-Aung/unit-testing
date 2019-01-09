<?php
/**
* 
*/
use PHPUnit\Framework\TestCase;
use App\Models\User;
class UserTest extends TestCase
{
	protected $user;

	public function setUp() 
	{
        $this->user = new User;
    }

	public function testThatweCanGetTheName()
	{

		$this->user->setName('lwin Moe Aung');

		$this->assertEquals($this->user->getName(),'lwin Moe Aung');
	}

	public function testThatweCanGetTheEmail()
	{

		$this->user->setEmail('lwinmoeaung@gmail.com');
		
		$this->assertEquals($this->user->getEmail(),'lwinmoeaung@gmail.com');
	}

	public function testEmailVariablesContainCorrectValues()
	{
		$this->user->setName('lwin Moe Aung');
		$this->user->setEmail('lwinmoeaung@gmail.com');
		$emailVariables = $this->user->getEmailVariables();

		$this->assertArrayHasKey('full_name', $emailVariables);
		$this->assertArrayHasKey('email', $emailVariables);

		$this->assertEquals($emailVariables['full_name'], 'lwin Moe Aung');
		$this->assertEquals($emailVariables['email'], 'lwinmoeaung@gmail.com');

	}
}


?>