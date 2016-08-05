<?php

namespace PsrLinter;

use function PsrLinter\getFuncInfo;
use function PsrLinter\isCamelCase;
use function PsrLinter\isMagicMethod;

function parseFile($path)
{
    return file_get_contents($path);
}


function lint($code)
{
    $info = getFuncInfo($code);
    $log = [];
    $result = isValidFunctionName($info,$log);
    var_dump($result);
}

function isValidFunctionName($funcInfo, $log)
{
    foreach ($funcInfo as $value){
        list ($func, $line) = $value;
        if (!isMagicMethod($func) && !isCamelCase($func)){
                writeLog($func, $line, 'NameIsNotValid', $log);
        }
    }
    return $log;
}


function run ($path)
{
    $code = parseFile($path);
    $errors = lint($code);
    showResult($errors);
}

function showResult ($log){
    if (empty($log)){
        echo "OK";
    } else {
        printf($log);
    }
}
