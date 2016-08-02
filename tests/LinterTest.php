<?php
namespace HexletPsrLinter\Tests;

class LinterTest extends \PHPUnit_Framework_TestCase 
{
	public function testGetData()
	{
		$data = 'data';
		$linter = new \HexletPsrLinter\Linter($data);
		$this->assertEquals($data, $linter->getData());
	}
}
