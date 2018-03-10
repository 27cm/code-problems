<?php

$string = 'reverse this string';

$string = implode(array_reverse(str_split($string)));

echo $string;

/*
 * Result:
 *
 * gnirts siht esrever
 */
