<?php

namespace PsrLinter;

use PhpParser\ParserFactory;

$code = "<?php\necho 'Hi PHP';";
$parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

function parseCode($code)
{
    try {
        $ast = $parser->parse($code);
    } catch (Exception $e) {
        echo 'Parse error', $e->getMessage();
    }
return $ast;
}

function lint ($code)
{
    return True;
}
