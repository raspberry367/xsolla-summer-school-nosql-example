<?php

namespace XsollaSchool\Command;

interface GeneratorCommandInterface
{
    /**
     * @param int $count
     */
    public function execute($count);
}