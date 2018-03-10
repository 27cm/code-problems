<?php

function foo($x)
{
    $y = $x + 1;
    return ++$x != $y;
}

var_dump(foo(a));

/*
 * Result:
 *
 * bool(true)
 */
