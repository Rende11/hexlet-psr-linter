<?php
namespace PsrLinter;

function writeLog($item, $line, $error, $log)
{
    $log[] = "$item in line $line is not $error";
    return $log;
}
