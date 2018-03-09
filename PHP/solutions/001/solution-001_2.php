<?php

namespace Magic;

function var_dump($input) {
    \var_dump(!$input);
}

// No changes allowed below

var_dump(true === false);

/*
 * Result:
 *
 * bool(true)
 */
