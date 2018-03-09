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

var_dump(foo(/* Insert your code here (best solution — 1 characters) */));

/*
 * Expected result:
 *
 * bool(true)
 */
