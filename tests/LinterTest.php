<?php

namespace PsrLinter;

use function PsrLinter\lint;

class LinterTest extends \PHPUnit_Framework_TestCase
{
    private $code = "<?php\necho 'Hi PHP';";

    public function testLint()
    {
        $this->assertTrue(lint($this->code), True);
    }
}
