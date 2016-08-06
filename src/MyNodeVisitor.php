<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $functions = [];
    public function leaveNode (Node $node)
    {
        if ($node instanceof Node\Stmt\Function_ || $node instanceof Node\Stmt\ClassMethod) {
            $this->functions[] = [$node->name,$node->getAttribute('startLine')];
        }
    }

    public function getFunctionsInfo ()
    {
        return $this->functions;
    }

    
}
