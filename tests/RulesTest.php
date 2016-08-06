<?php

namespace PsrLinter;

class RulesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider magicMethodProvider
     */
    public function testIsMagicMethod($funcName, $expected)
    {
        $this->assertEquals(isMagicMethod($funcName), $expected);
    }

    public function magicMethodProvider()
    {
        return [
            ['getName', false],
            ['__construct', true]
        ];
    }

    /**
     * @dataProvider camelCaseProvider
     */
    public function testIsCamelCase($funcName, $expected)
    {
        $this->assertEquals(isCamelCase($funcName), $expected);
    }

    public function camelCaseProvider()
    {
        return [
            ['getName', true],
            ['Getname', false],
            ['GetName', false]
        ];
    }
}
