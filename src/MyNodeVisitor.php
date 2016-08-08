<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use function PsrLinter\getRules;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];
    private $rules;
    
    public function __construct($rules)
    {
        $this->rules = $rules;
    }
    public function leaveNode(Node $node)
    {
        $this->checkNode($node, $this->rules);
    }

    public function checkNode($node, $rules)
    {
        foreach ($rules as $value) {
            list ($rule, $errorMessage, $type) = $value;
            if ($node instanceof $type) {
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
