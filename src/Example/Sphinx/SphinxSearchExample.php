<?php

namespace XsollaSchool\Example\Sphinx;

use XsollaSchool\Example\AbstractExample;
use XsollaSchool\Repository\DocumentRepository;

class SphinxSearchExample extends AbstractExample
{
    const KEYWORDS_SEARCH = [
        'smooth muscle',
        'typesetting',
        'forgery',
        'little bear',
        'some search keyword',
        'искомая фраза на русском',
        'gun shop',
        'hair dye',
        'egalitarian marriage',
        'sphinxsearch top, lol'
    ];

    private $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function runExampleUsingLike()
    {
        foreach (self::KEYWORDS_SEARCH as $searchKey) {
            echo "Search keyword - $searchKey. \n";
            $this->startStopwatch();
            $this->documentRepository->searchByDocumentContent($searchKey);
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n\n\n";

        $this->flushAll();
    }

    public function runExampleUsingSphinx()
    {
        foreach (self::KEYWORDS_SEARCH as $searchKey) {
            echo "Search keyword - $searchKey\n";
            $this->startStopwatch();
            $this->documentRepository->searchByDocumentContentUsingSphinxSearch($searchKey);
            echo $this->getExecutionTime() . "\n";
        }
        echo $this->getTotalTime() . "\n";
        $this->flushAll();
    }
}