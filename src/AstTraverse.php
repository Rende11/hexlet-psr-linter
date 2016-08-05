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

function createVisitor()
{
    return new MyNodeVisitor;
}

function createTraverser()
{
    return new NodeTraverser;
}

function getFunctionsNames($code)
{
    $parser = createParser();
    $visitor = createVisitor();
    $traverser = createTraverser();
    $ast = parseCode($code, $parser);
    $traverser->addVisitor($visitor);
    $node = $traverser->traverse($ast);
    return $visitor->getFunctionsNames();
}
