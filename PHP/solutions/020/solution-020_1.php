#!/usr/bin/env php
<?php

$land = $argv;
array_shift($land);

$leftMax  = 0;
$rightMax = 0;

$left  = 0;
$right = count($land) - 1;

$volume = 0;

while ($left < $right) {
    if ($land[$left] > $leftMax) {
        $leftMax = $land[$left];
    }
    if ($land[$right] > $rightMax) {
        $rightMax = $land[$right];
    }
    if ($leftMax >= $rightMax) {
        $volume += $rightMax - $land[$right];
        $right--;
    } else {
        $volume += $leftMax - $land[$left];
        $left++;
    }
}

fwrite(STDOUT, strval($volume) . PHP_EOL);

/*
 * Tests and results:
 *
 * $ ./solution-020.php 2 5 1 2 3 4 7 7 6
 * 10
 *
 * $ ./solution-020.php 3 2 1
 * 0
 *
 * $ ./solution-020.php 2 2 1 1 2
 * 2
 *
 * $ ./solution-020.php 5 3 2 1 2 3 4 5 4 3 0 5
 * 23
 *
 * $ ./solution-020.php 2 1 2 1 2
 * 2
 *
 * $ ./solution-020.php 3 2 1 2 1 2 0 2 3
 * 11
 *
 * $ ./solution-020.php 3 1 0 2
 * 3
 *
 * $ ./solution-020.php
 * 0
 *
 * $ ./solution-020.php 0
 * 0
 *
 * $ ./solution-020.php 1 1
 * 0
 *
 * $ ./solution-020.php 0 0 0
 * 0
 *
 * $ ./solution-020.php 2 5 1 3 1 2 1 7 7 6
 * 17
 *
 * $ ./solution-020.php 5 3 2 1 2 3 4 5 4 3 0 4
 * 20
 */
