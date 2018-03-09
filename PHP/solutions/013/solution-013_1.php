<?php

function foo($x)
{
    return $x === $x();
}

var_dump(foo(($x=session_id)($x).$x));

/*
 * Result:
 *
 * bool(true)
 */
