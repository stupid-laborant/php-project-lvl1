#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';

use function Brain\Games\Cli\sayHello as hello;

function play()
{
    hello();
}