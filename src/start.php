<?php

use LeadGenerator\Generator as LeadGenerator;
use LeadGenerator\Handler as LeadHandler;

require __DIR__.'/../vendor/autoload.php';

$start = microtime(true);

$generator = new LeadGenerator();
$generator->generateLeads(10000, new LeadHandler());
$end = microtime(true);

echo sprintf("Total time: %f", $end - $start).PHP_EOL;
