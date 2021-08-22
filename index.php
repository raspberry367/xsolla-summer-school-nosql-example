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
$redisConnection = new Predis\Client('tcp://' . $_ENV['REDIS_HOST'] . ':' . $_ENV['REDIS_PORT']);
$clickhouseConnection = new ClickHouseDB\Client([
    'host' => $_ENV['CLICKHOUSE_HOST'],
    'port' => $_ENV['CLICKHOUSE_PORT'],
    'username' => $_ENV['CLICKHOUSE_USER'],
    'password' => $_ENV['CLICKHOUSE_PASSWORD']
]);
// Устанавливаем БД
$clickhouseConnection->database('default');

# fake string generator
$faker = Faker\Factory::create();

$documentRepository = new DocumentRepository($mysqlConnect, $sphinxSearchConnect);
$eventRepository = new EventRepository($mysqlConnect, $clickhouseConnection, $faker);

$example = $argv[1];
$number = $argv[2];

if ($example == 'redis') {
    $redisCacheDecorator = new RedisCacheDecorator($redisConnection, $documentRepository);
    $redisExample = new RedisCacheExample($redisCacheDecorator, $documentRepository);

    print_r('Run without redis cache' . "\n");
    $redisExample->runWithoutCache();

    print_r('Run with redis cache decorator' . "\n");
    $redisExample->runWithRedisCache();
    return;
}

if ($example == 'sphinx') {
    $sphinx = new SphinxSearchExample($documentRepository);
    echo "Example using mysql like: \n";
    $sphinx->runExampleUsingLike();

    echo "Example using sphinxsearch: \n";
    $sphinx->runExampleUsingSphinx();
    return;
}

if ($example == 'mongo') {
    $mongoExample = new MongoExample($mongoConnection);
    if ($number == 1) {
        $mongoExample->saveUnstructuredItems();
        return;
    }
    if ($number == 2) {
        $mongoExample->addNewItemsType();
        return;
    }
}

if ($example == 'clickhouse') {
    $clickhouseExample = new ClickhouseExample($eventRepository);

    if ($number == 1) {
        echo "Подсчет кол-ва логов, за несколько n дней: \n";
        echo "Clickhouse: \n";
        $clickhouseExample->runExampleCounting();
        echo "Mysql: \n";
        $clickhouseExample->runExampleCountingUsingMysql();
        return;
    }
    if ($number == 2) {
        echo 'Выведение списка приложений с указанием сколько event пришло за последние n дней с группировкой по event' . "\n";
        echo "Clickhouse: \n";
        $clickhouseExample->runExampleCountingByGroup();
        echo "Mysql: \n";
        $clickhouseExample->runExampleCountingByGroupUsingMysql();
        return;
    }
}

echo 'Bad params. See readme.md';
