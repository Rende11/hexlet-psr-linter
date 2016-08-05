<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $functions = [];

    public function leaveNode ($node)
    {
        if ($node instanceof Node\Stmt\Function_ || 
            $node instanceof Node\Stmt\ClassMethod){
            $this->functions[] = $node->name;
        }
    }

    public function getFunctionsNames()
    {
        return $this->functions;
    }
}
