<?php

function foo(array $x)
{
    return $x[0] === null;
}

var_dump(foo(/* Insert your code here (best solution — 2 characters) */));

/*
 * Expected result:
 *
 * bool(true)
 */
