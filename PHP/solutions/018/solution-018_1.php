<?php

function foo(array $x)
{
    return $x[0] === null;
}

var_dump(foo([]));

/*
 * Result:
 *
 * bool(true)
 */
