<?php

function foo($x)
{
    return $x === $x();
}

var_dump(foo(/* Insert your code here (best solution — 22 characters) */));

/*
 * Expected result:
 *
 * bool(true)
 */
