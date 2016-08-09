<?php

namespace PsrLinter;

$isMagicMethod = function ($item) {
    $magicMethods= ["__construct", " __destruct", "__call()", "__callStatic",
        "__get", "__set", "__isset", "__unset", "__sleep", "__wakeup",
        "__toString", "__invoke", "__set_state", "__clone", "__debugInfo"
    ];
    return in_array($item, $magicMethods);
};

$isCamelCase = function ($item) {
    return \PHP_CodeSniffer::isCamelCaps($item);
};

$checkRules = [
    [$isCamelCase, 'Function names MUST be declared in camelCase()', 'Node\Stmt\Function_'],
    [$isMagicMethod,'Function names MUST be declared in camelCase()', 'Node\Stmt\Function_']
];
