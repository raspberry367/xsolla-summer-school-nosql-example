<?php

namespace XsollaSchool\Repository;

use PDO;

class DocumentRepository
{
    private $mysqlConnect;

    private $sphinxConnect;

    public function __construct(PDO $mysqlConnect, PDO $sphinxConnect)
    {
        $this->mysqlConnect = $mysqlConnect;
        $this->sphinxConnect = $sphinxConnect;
    }

    public function searchByDocumentContent($searchPhrase)
    {
        $query = $this->mysqlConnect->prepare(
            'SELECT * FROM school.documents WHERE value LIKE \'%?%\' ORDER BY id DESC LIMIT 500'
        );
        $query->execute([$searchPhrase]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByDocumentContentUsingSphinxSearch(string $searchPhrase)
    {
        $query = $this->sphinxConnect->prepare(
            'SELECT 
                        id, 
                        WEIGHT() as w 
                    FROM idx_documents 
                    WHERE MATCH (?) 
                    ORDER BY w DESC LIMIT 500
                    OPTION field_weights=(value=10, author=3);'
        );
        $query->execute([$searchPhrase]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateDocumentCountByCategory()
    {
        $query = $this->mysqlConnect->prepare(
            'SELECT c.name, 
                    COUNT(*) as count
                    FROM school.documents
                    JOIN school.categories c on documents.category_id = c.id
                    GROUP BY category_id'
        );
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}