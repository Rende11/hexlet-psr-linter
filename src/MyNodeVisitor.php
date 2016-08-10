<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use function PsrLinter\Rules\isMagicMethod;
use function PsrLinter\Rules\isCamelCase;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];
    private $rules;
    
    public function __construct()
    {
        $this->rules = [
            ['isCamelCase', 'name MUST declared in camelCase', ['Node\Stmt\Function_', 'Node\Stmt\ClassMethod_']],
            ['isMagicMethod', 'name MUST declared in camelCase', ['Node\Stmt\Function_', 'Node\Stmt\ClassMethod_']]
        ];
    }
    
    public function leaveNode(Node $node)
    {
        $this->checkNode($node);
    }

    public function checkNode($node)
    {
        $nodeType = get_class($node);
        
        foreach ($this->rules as $value) {
            list($rule, $errorMessage, $supportedTypes) = $value;
            if (in_array($nodeType, $supportedTypes)) {
                if (!$rule($node)) {
                     $this->errors = [$node->name, $node->getAttribute('startLine'), $errorMessage];
                }
            }
        }
    }
         
    public function getErrors()
    {
        return $this->errors;
    }
}
