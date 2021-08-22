1. docker-compose  up -d --build
2. Накатить миграции
3. Наполнение базы данных 
   - php runner.php generate:documents
   - php runner.php generate:events
4. Запуск индексации 
   - docker exec -it xsolla_school_sphinx bash
   - searchd --config /etc/sphinxsearch/sphinx.conf
   - indexer --all
   
Список примеров:
 - Sphinx - поиск по контенту документов
 - Redis - кеширование запроса
 - MongoDB - сохранение неструктурированных данных
 - Clickhouse - сравнение аналитических запросов