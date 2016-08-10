<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use function PsrLinter\Rules\isMagicMethod;
use function PsrLinter\Rules\isCamelCase;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];
        
    public function leaveNode(Node $node)
    {
        $this->checkNode($node);
    }

    public function checkNode($node)
    {
        if ($node instanceof Node\Stmt\Function_) {
            if (!isMagicMethod($node) && !isCamelCase($node)) {
                $this->errors = [$node->name, $node->getAttribute('startLine'), "name MUST declared in camelCase"];
            }
        }
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}
