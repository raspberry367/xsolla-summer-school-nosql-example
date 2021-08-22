<?php

namespace XsollaSchool\Repository;

use ClickHouseDB\Client;
use PDO;
use Faker\Generator;

class EventRepository
{
    /**
     * @var PDO
     */
    private $mysqlConnect;

    /**
     * @var Client
     */
    private $clickHouseConnect;

    public function __construct(PDO $mysqlConnect, Client $clickhouseConnect, Generator $faker)
    {
        $this->mysqlConnect = $mysqlConnect;
        $this->clickhouseConnect = $clickhouseConnect;
        $this->faker = $faker;
    }

    /**
     * Example 1
     * Получение логов за последние n дней по конкретному приложению
     */

    public function searchClickhouseCountOfEventsByAppId()
    {
        $query = $this->clickhouseConnect->select(
            'SELECT
                    time, event, message
                FROM events
                PREWHERE
                    time > :time_from AND
                    app_id = :app_id
                ',
            [
                'time_from' => $this->faker->date(),
                'app_id' => $this->faker->numberBetween(1, 10)
            ]
        );
        $query->fetchRow('event');
    }

    public function searchMysqlCountOfEventsByAppId()
    {
        $query = $this->mysqlConnect->prepare(
            'SELECT
                        time, 
                        event, 
                        message
                    FROM events
                    WHERE
                        time > :time_from AND
                        app_id = :app_id;'
        );
        $query->execute([
            'time_from' => $this->faker->date(),
            'app_id' => $this->faker->numberBetween(1, 10)
        ]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Example 2
     * Выведение списка приложений с указанием сколько event прилетело
     * за последние n дней с группировкой по event
     */

    public function searchClickhouseCountOfEventsByAppIdWithGroupBy()
    {
        $query = $this->clickhouseConnect->select(
            'SELECT
                    app_id,
                    event, 
                    COUNT(*) as c
                FROM events
                WHERE
                    time > :time_from
                    GROUP BY app_id, event;
                ',
            [
                'time_from' => $this->faker->date()
            ]
        );
        $query->fetchRow('event');
    }

    public function searchMysqlCountOfEventsByAppIdWithGroupBy()
    {
        $query = $this->mysqlConnect->prepare(
            'SELECT 
                        app_id,
                        event, 
                        COUNT(*) as c
                    FROM events
                    WHERE
                        time > :time_from
                        GROUP BY app_id, event;
                    '
        );
        $query->execute([
            'time_from' => $this->faker->date()
        ]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}