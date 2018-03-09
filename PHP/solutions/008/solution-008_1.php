<?php

function foo($x)
{
    return $x;
}

var_dump(foo(!0));

/*
 * Result:
 *
 * bool(true)
 */
