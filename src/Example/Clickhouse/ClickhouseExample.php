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

    /**
     * Подсчет кол-ва логов, за несколько n дней
     */
    public function runExampleCounting()
    {
        echo "Пример подсчета на базе clickhouse: \n";
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->eventRepository->searchClickhouseCountOfEventsByAppId();
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }

    /**
     * Подсчет кол-ва логов, за несколько n дней
     */
    public function runExampleCountingUsingMysql()
    {
        echo "Пример подсчета на базе mysql: \n";
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
        echo "Пример подсчета на базе clickhouse: \n";
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
        echo "Пример подсчета на базе mysql: \n";
        for ($i = 0; $i <= 10; $i++) {
            $this->startStopwatch();
            $this->eventRepository->searchMysqlCountOfEventsByAppIdWithGroupBy();
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }
}

