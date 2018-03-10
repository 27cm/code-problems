<?php

ob_start(function() {
    return 'Hello PHP World';
});

// No changes allowed below

echo 'Hello';
echo 'World';

/*
 * Result:
 *
 * Hello PHP World
 */
