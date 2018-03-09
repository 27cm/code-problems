<?php

$string = 'reverse this string';

for ($i = strlen($string) - 1, $j = 0; $j < $i; $i--, $j++) {
    list($string[$j], $string[$i]) = [$string[$i], $string[$j]];
}

echo $string;

/*
 * Result:
 *
 * gnirts siht esrever
 */
