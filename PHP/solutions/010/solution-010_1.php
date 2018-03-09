<?php

function foo($x)
{
    return ($x >= 1) && ($x <= 1) && ($x !== 1);
}

var_dump(foo(1.));

/*
 * Result:
 *
 * bool(true)
 */
