<?php

namespace XsollaSchool\Command;

use Faker\Generator;
use PDO;

class DocumentGenerateCommand implements GeneratorCommandInterface
{
    private $connect;

    private $faker;

    public function __construct(PDO $connect, Generator $faker)
    {
        $this->connect = $connect;
        $this->faker = $faker;
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
        $authorName = $this->faker->name;
        $documentName = $this->faker->uuid;

        $query = $this->connect->prepare(
            'INSERT INTO school.documents (
                      uuid, 
                      author, 
                      value, 
                      locale, 
                      category_id, 
                      created_at, 
                      updated_at
                    ) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)'
        );
        $query->execute([
            $documentName,
            $authorName,
            $this->faker->realText(5000),
            'en_EN',
            rand(1, 201),
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s")
        ]);
    }
}