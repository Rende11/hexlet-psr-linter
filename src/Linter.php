<?php

namespace PsrLinter;

use function PsrLinter\getErrorList;


function parseFile($path)
{
    return file_get_contents($path);
}

function lint($code)
{
    $info = getErrorList($code);
    $result = isValidFunctionName($info, $logger);
    var_dump($result);
    return $result;
}


function run($path)
{
    $code = parseFile($path);
    $errors = lint($code);
    return $errors;
}

function showResult($log)
{
    if (empty($log)) {
        echo "OK";
    } else {
        var_dump($log);
        foreach ($log as $value) {
            echo $value;
        };
    }
}
