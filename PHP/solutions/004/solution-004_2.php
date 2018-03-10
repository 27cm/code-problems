<?php

$var = new class {
    public function __destruct() {
        $GLOBALS['var'] = 'World!';
    }
};

// No changes allowed below

$var = 'Hello!';
echo $var;

/*
 * Result:
 *
 * World!
 */
