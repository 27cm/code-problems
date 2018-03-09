<?php

$value = 0;
$array = [&$value, &$value, &$value];

// No changes allowed below

var_dump(count($array), array_sum($array));

$array[0] = 1;
$array[1] = 2;
$array[2] = 3;

var_dump(count($array), array_sum($array));

/*
 * Result:
 *
 * int(3)
 * int(0)
 * int(3)
 * int(9)
 */
