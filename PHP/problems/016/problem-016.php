<?php

function foo($x)
{
    $y = $x + 1;
    return ++$x != $y;
}

var_dump(foo(/* Insert your code here (best solution — 1 character) */));

/*
 * Expected result:
 *
 * bool(true)
 */
