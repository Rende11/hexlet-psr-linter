<?php

namespace PsrLinter;

require_once __DIR__."/../vendor/autoload.php";
use function getFunctions;

$code = "<?php\n echo 'p';";

$functions = getFunctions($code);

var_dump ($functions);

function validateFuncName($funcName)
{
    // $va
    // $result = [];
    // foreach ($funcNameRules as $rule) {
    //     if (!$rule($funcName)){
    //         $result[] = [$funcName, $rule];
    //     }
    // }
    // if (empty($result)){
    //     return true;
    // }
    // return false;
}

function lint($code)
{
    return true;
}
