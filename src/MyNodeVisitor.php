<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $functions = [];

    public function leaveNode ($node)
    {
        if ($node instanceof Node\Stmt\Function_){
            $this->functions[] = $node;
        }
    }

    public function getFunctions ()
    {
        return $this->functions;
    }
}
