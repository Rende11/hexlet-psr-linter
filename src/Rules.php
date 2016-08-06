<?php

namespace PsrLinter;

const MAGICMETHODS= [
    "__construct",
    " __destruct",
    "__call()",
    "__callStatic",
    "__get",
    "__set",
    "__isset",
    "__unset",
    "__sleep",
    "__wakeup",
    "__toString",
    "__invoke",
    "__set_state",
    "__clone",
    "__debugInfo"
];



function isCamelCase($item)
{
    return \PHP_CodeSniffer::isCamelCaps($item);
}

function isMagicMethod($item)
{
    return in_array($item, MAGICMETHODS);
}
