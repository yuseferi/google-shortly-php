<?php

require_once __DIR__ . '/../vendor/autoload.php';

use zhilevan\GoogShortly;
use zhilevan\GoogShortlyException;
try {
    # GOOGLE_API=ABCDABCDABCDABCDABCDABCDABCDABCDABCDABC php examples/example.php
    $googShort = new GoogShortly(getenv('GOOGLE_API'));

    $link = $googShort->shorten('http://zhilevan.com');
    printf($link . "\n");

    $link = $googShort->expand('http://goo.gl/KkZ8');
    printf($link . "\n");

} catch (GoogShortlyException $e) {
    printf('Error (%d): %s', $e->getCode(), $e->getMessage());
}
