<?php
namespace PsrLinter;

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PsrLinter\NodeVisitor;
use function PsrLinter\getErrors;

function createParser()
{
    return (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
}

function parseCode($code, $parser)
{
    return $parser->parse($code);
}

function createVisitor($rules)
{
    return new MyNodeVisitor($rules);
}

function createTraverser()
{
    return new NodeTraverser;
}

function getErrorList($code, $rules)
{
    $parser = createParser();
    $visitor = createVisitor($rules);
    $traverser = createTraverser();
    $ast = parseCode($code, $parser);
    $traverser->addVisitor($visitor);
    $node = $traverser->traverse($ast);
    return $visitor->getErrors();
}
