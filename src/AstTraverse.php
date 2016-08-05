<?php
namespace PsrLinter;

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PsrLinter\NodeVisitor;


function createParser()
{
    return (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
}

function parseCode($code, $parser)
{
    return $parser->parse($code);

}

function getFunctionsNames($code)
{
    $parser = createParser();
    $visitor = new MyNodeVisitor;
    $traverser = new NodeTraverser;
    $ast = parseCode($code, $parser);
    $traverser->addVisitor($visitor);
    $ast = $traverser->traverse($ast);
    return $visitor->getFunctionsNames();
}
