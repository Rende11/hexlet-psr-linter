<?php

namespace PsrLinter;

use PhpParser\ParserFactory;

function createParser ()
{
    return (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
}

function parseCode($code, $parser)
{
    try {
        $ast = $parser->parse($code);
    } catch (Exception $e) {
        echo 'Parse error', $e->getMessage();
    }
    return $ast;
}

function validateFuncName($funcName)
{
    return false;
}

function lint($code)
{
    return true;
}
