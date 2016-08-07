<?php

namespace PsrLinter;

use function PsrLinter\writeLog;

class LoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testWriteLog()
    {
        $emptyLog = [];
        $log = writeLog("testFunc", 7, "Wrong function name", $emptyLog);
        $this->assertEquals("line 7 | Wrong function name - testFunc", $log[0]);
    }
}
