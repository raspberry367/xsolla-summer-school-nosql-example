<?php

namespace XsollaSchool\Example\Mongo;

use MongoDB\Client;

class MongoExample
{
    /**
     * @var Client
     */
    private $mongoConnection;

    public function __construct(Client $mongoConnection)
    {
        $this->mongoConnection = $mongoConnection;
    }

    /**
     * Динамическая встравка данных
     *
     * Аналогично вставке документов из командной строки:
     *
     * db.items.insertMany([
     *      {"type":"book","author":"Some Author 1","desc":"Good book 2","category":"Science"},
     *      {"type":"book","author":"Some Author 2","desc":"Good book 2","category":"Fantasy"},
     *      {"type":"book","author":"Some Author 3","desc":"Good book 2","category":"Fantasy"},
     *      {"type":"book","author":"Some Author 4","desc":"Good book 2","category":"Fantasy"},
     *      {"type":"book","author":"Some Author 5","desc":"Good book","category":"Fantasy"}
     * ]);
     */
    public function saveUnstructuredItems()
    {
        $items = [
            [
                'type' => 'book',
                'author' => 'Some Author 1',
                'desc' => 'Good book 2',
                'category' => 'Science'
            ],
            [
                'type' => 'book',
                'author' => 'Some Author 2',
                'desc' => 'Good book 2',
                'category' => 'Fantasy'
            ],
            [
                'type' => 'book',
                'author' => 'Some Author 3',
                'desc' => 'Good book 2',
                'category' => 'Fantasy'
            ],
            [
                'type' => 'book',
                'author' => 'Some Author 4',
                'desc' => 'Good book 2',
                'category' => 'Fantasy'
            ],
            [
                'type' => 'book',
                'author' => 'Some Author 5',
                'desc' => 'Good book',
                'category' => 'Fantasy'
            ],
        ];

        $database = $this->mongoConnection->school;
        $insertResult = $database->items->insertMany($items);
        $insertedIds = $insertResult->getInsertedIds();
        print_r('Mongodb example: inserted ids' . "\n");
        print_r($insertedIds);

        /**
         * $nin - Not In
         * $ne - Not equal
         * $in - in array
         * $exists
         * $lte/$gte - less/greater then equals
         */
        $items = $this->mongoConnection->school->items->find([
            '$or' => [
                ['author' => 'Some Author 3'],
                ['category' => 'Fantasy']
            ]
        ]);

        print_r('Mongodb example: filtered result' . "\n");
        print_r($items->toArray());
    }

    /**
     * Фильтрация по вложенным данным
     */
    public function addNewItemsType()
    {
        $items = [
            [
                'name' => 'Закладка для книги',
                'type' => 'tool',
                'color' => 'Красный',
                'material' => 'Картон',
                'comments' => [
                    [
                        'name' => 'Boba',
                        'value' => 'Норм',
                        'replies' => []
                    ]
                ]
            ],
            [
                'name' => 'Ручка',
                'type' => 'tool',
                'color' => 'Синий',
                'comments' => [
                    [
                        'name' => 'Biba',
                        'value' => 'Классная ручка!',
                        'replies' => [
                            'name' => 'Boba',
                            'value' => 'А мне не понравилось :(',
                            'replies' => []
                        ]
                    ]
                ]
            ],
        ];

        $this->mongoConnection->school->items->insertMany($items);

        $result = $this->mongoConnection->school->items->find([
                'comments' => [
                    '$elemMatch' => [
                        'name' => 'Biba'
                    ]
                ]
            ]);

        print_r($result->toArray());
    }
}