<?php

use XsollaSchool\Command\DocumentGenerateCommand;
use XsollaSchool\Command\EventGenerateCommand;
use XsollaSchool\Command\GeneratorCommandInterface;
use XsollaSchool\Tools\ConnectionHandler;

require_once './vendor/autoload.php';

const COMMANDS = [
    'generate:documents' => DocumentGenerateCommand::class,
    'generate:events' => EventGenerateCommand::class,
];

$commandName = $argv[1];
if (!array_key_exists($commandName, COMMANDS)) {
    die("Command $commandName not found. Check command name.\n");
}

#init configs, tools and connections
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$faker = Faker\Factory::create();

$connectionHandler = new ConnectionHandler();
$connectionHandler->addConnection(
    ConnectionHandler::MYSQL_CONNECT,
    $_ENV['MYSQL_HOST'],
    $_ENV['MYSQL_PORT'],
    $_ENV['MYSQL_DATABASE'],
    $_ENV['MYSQL_USER'],
    $_ENV['MYSQL_PASSWORD']
);
$connect = $connectionHandler->getConnection(ConnectionHandler::MYSQL_CONNECT);
$className = COMMANDS[$commandName];

/**
 * @var GeneratorCommandInterface
 */
$command = new $className($connect, $faker);

if (COMMANDS[$commandName] == EventGenerateCommand::class) {
    // Указываем подключение
    $db = new ClickHouseDB\Client([
        'host' => 'localhost',
        'port' => '8123',
        'username' => 'clickhouse-user',
        'password' => 'secret'
    ]);
// Устанавливаем БД
    $db->database('default');

    $command->setClickhouseConnect($db);
}

$command->execute();