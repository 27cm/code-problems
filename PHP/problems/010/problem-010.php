<?php

function foo($x)
{
    return ($x >= 1) && ($x <= 1) && ($x !== 1);
}

var_dump(foo(/* Insert your code here (best solution — 2 characters) */));

/*
 * Expected result:
 *
 * bool(true)
 */
