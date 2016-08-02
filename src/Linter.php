<?php
namespace HexletPsrLinter;


class Linter 
{
	private $data;

	public function __construct ($data)
	{
		$this->data = $data;
	}

	public function getData ()
	{
		return $this->data;
	}

}
