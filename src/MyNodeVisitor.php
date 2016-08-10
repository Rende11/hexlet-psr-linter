<?php
namespace PsrLinter;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use function PsrLinter\Rules\isMagicMethod;
use function PsrLinter\Rules\isCamelCase;

class MyNodeVisitor extends NodeVisitorAbstract
{
    private $errors = [];
    private $checks = [];
    
    public function leaveNode(Node $node)
    {
        $this->checkNode($node);
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
