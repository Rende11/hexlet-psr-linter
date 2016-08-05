<?php

namespace PsrLinter;

require_once __DIR__."/../vendor/autoload.php";




function lint($code)
{
    $function = getFunctionsNames($code);
    var_dump($function);
}

function checkFuncName ($item)
{
    if (!isCamelCase($item)){
        file_put_contents('log.php', 'ERROR'.$item);
    }
    
    if (!isMagicMethod($item)){
        file_put_contents('log.php', 'ERROR'.$item);
    }
}
