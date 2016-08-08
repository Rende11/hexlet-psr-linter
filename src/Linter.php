<?php

namespace PsrLinter;

use function PsrLinter\getErrorList;

function parseFile($path)
{
    return file_get_contents($path);
}

function lint($code)
{
    $errors = getErrorList($code, $rules);
    return $errors;
}

function showResult($errors)
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

function returnExitCode($errors)
{
    if ($errors) {
        exit(2);
    }
}
