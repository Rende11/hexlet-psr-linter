<?php
namespace PsrLinter;

function writeLog($item, $line, $error, array $log)
{
    $log[] = "line $line | $error - $item";
}

function showLog(array $log)
{
    array_map(function ($item) {
        printf($item);
    }, $log);
}
