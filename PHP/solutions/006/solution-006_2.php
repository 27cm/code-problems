<?php

ob_start(function ($buffer) {
    return wordwrap($buffer, 5, " PHP ", true);
});

// No changes allowed below

echo 'Hello';
echo 'World';

/*
 * Result:
 *
 * Hello PHP World
 */
