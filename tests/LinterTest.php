<?php

namespace PsrLinter;

use function PsrLinter\lint;
use function PsrLinter\parseFile;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    private $code;
    private $path;

    protected function setUp()
    {
        $this->code = file_get_contents('tests/fixtures/example.php');
        $this->path = 'tests/fixtures/example.php';
    }

    public function testLint()
    {
        $this->assertTrue(lint($this->code), true);
    }

    
}
