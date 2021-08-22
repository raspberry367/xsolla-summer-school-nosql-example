<?php

use XsollaSchool\Example\Clickhouse\ClickhouseExample;
use XsollaSchool\Example\Mongo\MongoExample;
use XsollaSchool\Example\Redis\RedisCacheExample;
use XsollaSchool\Example\Sphinx\SphinxSearchExample;
use XsollaSchool\Repository\EventRepository;
use XsollaSchool\Repository\RedisCacheDecorator;
use XsollaSchool\Repository\DocumentRepository;
use XsollaSchool\Tools\ConnectionHandler;

require_once './vendor/autoload.php';

#init configs, tools and connections
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$connectionHandler = new ConnectionHandler();
$connectionHandler->addConnection(
    ConnectionHandler::MYSQL_CONNECT,
    $_ENV['MYSQL_HOST'],
    $_ENV['MYSQL_PORT'],
    $_ENV['MYSQL_DATABASE'],
    $_ENV['MYSQL_USER'],
    $_ENV['MYSQL_PASSWORD']
);
$connectionHandler->addConnection(
    ConnectionHandler::SPHINX_CONNECT,
    $_ENV['SPHINX_HOST'],
    $_ENV['SPHINX_PORT']
);
$mysqlConnect = $connectionHandler->getConnection(ConnectionHandler::MYSQL_CONNECT);
$sphinxSearchConnect = $connectionHandler->getConnection(ConnectionHandler::SPHINX_CONNECT);

$mongoConnection = new MongoDB\Client();

# fake string generator
$faker = Faker\Factory::create();

$documentRepository = new DocumentRepository($mysqlConnect, $sphinxSearchConnect);

# Sphinx example
$sphinx = new SphinxSearchExample($documentRepository);
//$sphinx->runExampleUsingLike();
//$sphinx->runExampleUsingSphinx();

# Mongo example
$mongoExample = new MongoExample($mongoConnection);
//$mongoExample->saveUnstructuredItems();
//$mongoExample->addNewItemsType();

# Clickhouse example

$db = new ClickHouseDB\Client([
    'host' => 'localhost',
    'port' => '8123',
    'username' => 'clickhouse-user',
    'password' => 'secret'
]);
// Устанавливаем БД
$db->database('default');

$eventRepository = new EventRepository($mysqlConnect, $db, $faker);
$clickhouseExample = new ClickhouseExample($eventRepository);
# Example 1
//$clickhouseExample->runExampleCounting();
//$clickhouseExample->runExampleCountingUsingMysql();

# Example 2
$clickhouseExample->runExampleCountingByGroup();
$clickhouseExample->runExampleCountingByGroupUsingMysql();