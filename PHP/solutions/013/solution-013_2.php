<?php

function foo($x)
{
    return $x === $x();
}

var_dump(foo($f=function()use(&$f){return$f;}));

/*
 * Result:
 *
 * bool(true)
 */
