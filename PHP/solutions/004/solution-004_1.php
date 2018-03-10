<?php

ob_start(function() {
    return 'World!';
});

// No changes allowed below

$var = 'Hello!';
echo $var;

/*
 * Result:
 *
 * World!
 */
