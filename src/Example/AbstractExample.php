<?php

namespace XsollaSchool\Example;

abstract class AbstractExample
{
    private $totalTime;
    private $startTime;
    private $endTime;

    public function startStopwatch()
    {
        $this->startTime = microtime(true);
        if (!$this->totalTime) {
            $this->totalTime = $this->startTime;
        }
    }

    public function endStopwatch()
    {
        $this->endTime = microtime(true);
    }

    public function getExecutionTime(): string
    {
        $this->endStopwatch();

        return sprintf('Time: %f', round($this->endTime - $this->startTime, 3));
    }

    public function getTotalTime(): string
    {
        return sprintf('Total time: %f', round($this->endTime - $this->totalTime, 3));
    }

    public function flushAll()
    {
        $this->totalTime = null;
        $this->startTime = null;
        $this->endTime = null;
    }
}