<?php
namespace PsrLinter;

function getFuncNameRules()
{
    return $funcNameRules;
}

$magicMethods = [
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

$isCamelCase = function ($item){
    return true;
};

$isMagicMethod = function ($item) use ($magicMethods){
    return in_array($item, $magicMethods);
};

$funcNameRules = [$isCamelCase, $isMagicMethod];
