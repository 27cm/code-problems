<?php

function foo($x)
{
    return $x;
}

var_dump(foo(true));

/*
 * Result:
 *
 * bool(true)
 */
