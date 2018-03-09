<?php

function foo($x)
{
    return $x === $x();
}

var_dump(foo(new class{function __invoke(){return $this;}}));

/*
 * Result:
 *
 * bool(true)
 */
