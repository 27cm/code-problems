<?php

function foo($x)
{
    return $x('gehr') === 'true';
}

var_dump(foo(function(){return'true';}));

/*
 * Result:
 *
 * bool(true)
 */
