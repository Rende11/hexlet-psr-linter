<?php

namespace PsrLinter\Rules;

function isMagicMethod($item) {
    $magicMethods= ["__construct", " __destruct", "__call()", "__callStatic",
        "__get", "__set", "__isset", "__unset", "__sleep", "__wakeup",
        "__toString", "__invoke", "__set_state", "__clone", "__debugInfo"
    ];
    return in_array($item, $magicMethods);
};

function isCamelCase($item) {
    return \PHP_CodeSniffer::isCamelCaps($item);
};
