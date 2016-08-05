<?php
namespace PsrLinter;

use PsrLinter\AstTraverse;
use function PsrLinter\getFunctionsNames;

class AstTraverseTest extends \PHPUnit_Framework_TestCase
{
    private $code;
    private $fuctionNames = ["test", "identity"];
    protected function setUp()
    {
        $this->code = file_get_contents('tests/fixtures/example.php');
    }

    public function testGetFunctionsNames()
    {
        var_dump(getFunctionsNames($this->code));
        $this->assertEquals(getFunctionsNames($this->code), $this->fuctionNames);
    }
}
