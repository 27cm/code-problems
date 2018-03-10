<?php

function foo(stdClass $x)
{
    $x = (array) $x;
    return $x[0];
}

var_dump(foo(/* Insert your code here (best solution — 12 characters) */));

/*
 * Expected result:
 *
 * bool(true)
 */
