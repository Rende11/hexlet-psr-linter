<?php

namespace PsrLinter;

use function PsrLinter\lint;
use function PsrLinter\validateFuncName;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    private $code;

    protected function setUp()
    {
        $this->code = "<?php\necho 'Hi PHP';";
    }

    public function testLint()
    {
        $this->assertTrue(lint($this->code), true);
    }

    
}
