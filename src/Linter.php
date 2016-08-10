<?php

namespace PsrLinter;

use function PsrLinter\getErrorList;
use function PsrLinter\getRules;

function parseFile($path)
{
    return file_get_contents($path);
}

function lint($code)
{
    $errors = getErrorList($code, $rules);
    return $errors;
}

function getResult($errors)
{
    return (empty($errors)) ? "OK" : glueLog($errors);
}

function glueLog($errors)
{
    foreach ($errors as $value) {
        list ($name, $startLine, $errorMessage) = $value;
        $log[] = implode("| ", $value);
    }
    return $log;
}
