<?php
namespace PsrLinter;

use PsrLinter\AstTraverse;
use function PsrLinter\getFuncInfo;

class AstTraverseTest extends \PHPUnit_Framework_TestCase
{
    private $code;
    private $fuctionNames = [
        ["test", "3"],
        ["IDENTITY", "7"]
    ];
    protected function setUp()
    {
        $this->code = file_get_contents('tests/fixtures/example.php');
    }

    public function testGetFuncInfo()
    {
        $this->assertEquals(getFuncInfo($this->code), $this->fuctionNames);
    }
}
