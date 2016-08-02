<?php

namespace PsrLinter;

class LinterTest extends \PHPUnit_Framework_TestCase
{
	public function testGetData()
	{
		$data = 'data';
		$linter = new Linter($data);

		$this->assertEquals($data, $linter->getData());
	}
}
