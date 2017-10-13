<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SwiftMailerHandler;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$path = __DIR__ . '/logs/mono.log';
$logger = new Logger('email');
$logger->pushHandler(new StreamHandler($path, Logger::INFO));

$mailer = new Swift_Mailer(
    new Swift_SendmailTransport('/usr/sbin/sendmail -bs')
);
$message = (new Swift_Message('monolog'))
    ->setTo(getenv('EMAIL'))
    ->setFrom(['foo@example.com' => 'foo']);
$logger->pushHandler(new SwiftMailerHandler($mailer, $message, Logger::ALERT));

$logger->debug('debug');
$logger->info('info');
$logger->notice('notice');
$logger->warning('warning');
$logger->error('error');
$logger->critical('critical');
$logger->alert('alert');
$logger->emergency('emergency');

echo 'done.' . PHP_EOL;
