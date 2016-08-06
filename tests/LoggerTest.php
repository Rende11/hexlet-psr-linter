<?php

namespace PsrLinter;

use function PsrLinter\writeLog;

class LoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testWriteLog()
    {
        $emptyLog = [];
        $log = writeLog("testFunc", 7, "isCamelCase", $emptyLog);
        $this->assertEquals("testFunc in line 7 is not isCamelCase", $log[0]);
    }
}
