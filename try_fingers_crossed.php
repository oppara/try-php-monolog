<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;


$path = __DIR__ . '/logs/mono.log';
$logger = new Logger('fingers_crossed');
$logger->pushHandler(
    new FingersCrossedHandler(
        new RotatingFileHandler($path, 2, Logger::INFO),
        new ErrorLevelActivationStrategy(Logger::ALERT)
    )
);

$logger->debug('debug');
$logger->info('info');
$logger->notice('notice');
$logger->warning('warning');
$logger->error('error');
$logger->critical('critical');
$logger->alert('alert');
$logger->emergency('emergency');
