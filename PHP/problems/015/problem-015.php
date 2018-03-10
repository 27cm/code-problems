<?php

class Bar {}

function foo(Bar $x)
{
    return get_class($x) != 'Bar';
}

var_dump(foo(/* Insert your code here (best solution — 23 characters) */));

/*
 * Expected result:
 *
 * bool(true)
 */
