<?php

register_tick_function(function () {
    echo ' PHP ';
});

declare(ticks=2);

// No changes allowed below

echo 'Hello';
echo 'World';

/*
 * Result:
 *
 * Hello PHP World
 */
