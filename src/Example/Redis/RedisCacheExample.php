<?php

namespace XsollaSchool\Example\Redis;

use XsollaSchool\Example\AbstractExample;
use XsollaSchool\Repository\RedisCacheDecorator;
use XsollaSchool\Repository\DocumentRepository;

class RedisCacheExample extends AbstractExample
{
    /**
     * @var RedisCacheDecorator
     */
    private $redisCacheDecorator;

    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    public function __construct(
        RedisCacheDecorator $redisCacheDecorator,
        DocumentRepository $documentRepository
    ) {
        $this->redisCacheDecorator = $redisCacheDecorator;
        $this->documentRepository = $documentRepository;
    }

    public function runWithoutCache()
    {
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->documentRepository->calculateDocumentCountByCategory();
            echo $i . '. ' . $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n";

        $this->flushAll();
    }

    public function runWithRedisCache()
    {
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->redisCacheDecorator->calculateDocumentCountByCategory();
            echo $i . '. ' . $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n";

        $this->flushAll();
    }
}