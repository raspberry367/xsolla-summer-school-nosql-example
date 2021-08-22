<?php

namespace XsollaSchool\Example\Clickhouse;

use XsollaSchool\Example\AbstractExample;
use XsollaSchool\Repository\EventRepository;

class ClickhouseExample extends AbstractExample
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function runExampleCounting()
    {
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->eventRepository->searchClickhouseCountOfEventsByAppId();
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }

    public function runExampleCountingUsingMysql()
    {
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->eventRepository->searchMysqlCountOfEventsByAppId();
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }

    public function runExampleCountingByGroup()
    {
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->eventRepository->searchClickhouseCountOfEventsByAppIdWithGroupBy();
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }

    public function runExampleCountingByGroupUsingMysql()
    {
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->eventRepository->searchMysqlCountOfEventsByAppIdWithGroupBy();
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }
}

