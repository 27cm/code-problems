<?php

function foo(stdClass $x)
{
    $x = (array) $x;
    return $x[0];
}

var_dump(foo((object)[!0]));

/*
 * Result:
 *
 * bool(true)
 */
