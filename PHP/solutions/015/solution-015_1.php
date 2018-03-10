<?php

class Bar {}

function foo(Bar $x)
{
    return get_class($x) != 'Bar';
}

var_dump(foo(new class extends Bar{}));

/*
 * Result:
 *
 * bool(true)
 */
