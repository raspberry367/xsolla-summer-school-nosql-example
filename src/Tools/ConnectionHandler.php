<?php

namespace XsollaSchool\Tools;

use PDO;

class ConnectionHandler
{
    const ENCODING = 'utf8mb4';

    const MYSQL_CONNECT = 'mysql',
        SPHINX_CONNECT = 'sphinx';

    /**
     * @var PDO[]
     */
    private $connectionPool;

    public function __construct()
    {
        $this->connectionPool = [];
    }

    public function addConnection(
        string $name,
        string $host,
        string $port,
        string $database = null,
        string $user = null,
        string $password = null
    ) {
        $dsn = sprintf(
            "mysql:host=%s;dbname=%s;charset=%s;port=%s",
            $host,
            $database,
            self::ENCODING,
            $port
        );

        try {
            $this->connectionPool[$name] = new \PDO($dsn, $user, $password);
            $this->connectionPool[$name]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection($name): PDO
    {
        if (array_key_exists($name, $this->connectionPool)) {
            return $this->connectionPool[$name];
        }

        throw new \LogicException('Connection not found in db pool :(');
    }
}