<?php

ob_start(function ($buffer) {
	return strrev($buffer);
});

// No changes allowed below

echo 'Foobar';
echo PHP_EOL;
echo 'Hello World';

/*
 * Result:
 *
 * dlroW olleH
 * rabooF
 */
