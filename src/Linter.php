<?php

namespace PsrLinter;

use function PsrLinter\getFuncInfo;
use function PsrLinter\isCamelCase;
use function PsrLinter\isMagicMethod;
use function PsrLinter\writeLog;

function parseFile($path)
{
    return file_get_contents($path);
}


function lint($code)
{
    $info = getFuncInfo($code);
    $log = [];
    $result = isValidFunctionName($info, $log);
    var_dump($result);
    return true;
}

function isValidFunctionName($funcInfo, $logger)
{
    foreach ($funcInfo as $value) {
        list ($func, $line) = $value;
        if (!isMagicMethod($func) && !isCamelCase($func)){
                $log = writeLog($func, $line, 'camelCase', $logger);
        }
    }
    return $log;
}


function run($path)
{
    $code = parseFile($path);
    $errors = lint($code);
    showResult($errors);
}

function showResult($log) {
    if (empty($log)) {
        echo "OK";
    } else {
        printf($log);
    }
}
