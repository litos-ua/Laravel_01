<?php
$a = 8;
$b = 10;

$closure = function($c) use($a, $b)
{
    return $a + $b + $c;
};

$result = $closure(32);	// 40
echo $result . PHP_EOL;





