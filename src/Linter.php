<?php

namespace PsrLinter;

use function PsrLinter\getErrorList;
use function PsrLinter\getRules;

function parseFile($path)
{
    return file_get_contents($path);
}

function makeLinter($code)
{
    return function ($rules) use ($code) {
        $errors = getErrorList($code, $rules);
    };
    return $errors;
}

function returnResult($errors)
{
    if (empty($errors)) {
        return "OK";
    } else {
        return glueLog($errors);
    }
}

function glueLog($errors)
{
    foreach ($errors as $value) {
        list ($name, $startLine, $errorMessage) = $value;
        $log[] = implode("| ", $value);
    }
    return $log;
}
