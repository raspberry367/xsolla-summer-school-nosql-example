<?php

namespace XsollaSchool\Repository;

use Predis\Client;

/**
 * @method calculateDocumentCountByCategory
 */
class RedisCacheDecorator
{
    private $redisConnection;
    private $documentRepository;

    public function __construct(Client $redisConnection, $documentRepository)
    {
        $this->redisConnection = $redisConnection;
        $this->documentRepository = $documentRepository;
    }

    public function __call($method, $params)
    {
        $hash = $this->getHash(__CLASS__, $method, $params);

        $value = $this->redisConnection->get($hash);

        if (!empty($value)) {
            return json_decode($value, true);
        }

        $result = $this->documentRepository->{$method}(...$params);
        if (!empty($result)) {
            $this->redisConnection->set($hash, json_encode($result));
        }

        return $result;
    }

    private function getHash(string $class, string $method, array $params = [])
    {
        return hash("sha512", $class . $method . $params);
    }
}