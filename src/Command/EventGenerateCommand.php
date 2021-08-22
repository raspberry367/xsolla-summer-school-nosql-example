<?php

namespace XsollaSchool\Command;

use Faker\Generator;
use ClickHouseDB\Client;
use PDO;

class EventGenerateCommand implements GeneratorCommandInterface
{
    /**
     * @var PDO
     */
    private $connect;

    /**
     * @var Generator
     */
    private $faker;

    /**
     * @var Client
     */
    private $clickHouseConnect;

    public function __construct(PDO $connect, Generator $faker)
    {
        $this->connect = $connect;
        $this->faker = $faker;
    }

    public function setClickhouseConnect($clickHouseConnect)
    {
        $this->clickHouseConnect = $clickHouseConnect;
    }

    public function execute($count = 1000000)
    {
        for ($i = 1; $i < $count; $i++) {
            $this->generateDocument();
            print_r("Insert counter: $i\n");
        }
    }

    public function generateDocument()
    {
        $query = $this->connect->prepare(
            'INSERT INTO school.events (
                      time, 
                      app_id, 
                      event, 
                      message
                    ) 
                    VALUES (?, ?, ?, ?)'
        );
        $query->execute([
            date("Y-m-d H:i:s"),
            $this->faker->numberBetween(1, 10),
            $this->faker->mimeType,
            $this->faker->text
        ]);

        $this->clickHouseConnect->insert('events', [
            [
                new \DateTime('2020-04-15 10:23:00'),
                $this->faker->numberBetween(1, 10),
                $this->faker->mimeType,
                $this->faker->text
            ]
        ], [
            'time',
            'app_id',
            'event',
            'message'
        ]);
    }
}