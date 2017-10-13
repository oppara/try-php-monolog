<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$path = __DIR__ . '/logs/mono.log';
$logger = new Logger('basic');
$logger->pushHandler(new StreamHandler($path, Logger::INFO));

$logger->debug('debug');
$logger->info('info');
$logger->notice('notice');
$logger->warning('warning');
$logger->error('error');
$logger->critical('critical');
$logger->alert('alert');
$logger->emergency('emergency');

echo 'done.' . PHP_EOL;
