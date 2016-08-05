<?php
namespace PsrLinter;

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;


function createParser()
{
    return (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
}

function parseCode($code, $parser)
{
    return $parser->parse($code);

}

function createTraverser()
{
    return new NodeTraverser;
}

$defaultParseCode = function ($code) use ($parser){
    return parseCode($code, $parser);
};
function getFunctions($code)
{
    $parser = createParser();
    $ast = $defaultParseCode($code);
    $visitor = new MyNodeVisitor;
    $traverser = new NodeTraverser;
    $traverser->addVisitor($visitor);
    $result = $traverser->traverse($ast);
    return $visitor->getFunctions();
}
