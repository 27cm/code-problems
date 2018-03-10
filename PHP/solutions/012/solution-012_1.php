<?php

function foo($x)
{
    return strlen($x) === 4;
}

var_dump(foo(🍔));

/*
 * Result:
 *
 * bool(true)
 */
