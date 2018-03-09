<?php

function foo($x)
{
    $a = 0;
    switch ($a) {
        case $x:
            return true;
        case 0:
            return false;
    }
    return false;
}

var_dump(foo(0));

/*
 * Result:
 *
 * bool(true)
 */
