<?php

function foo($x)
{
    return $x('gehr') === 'true';
}

var_dump(foo(str_rot13));

/*
 * Result:
 *
 * bool(true)
 */
