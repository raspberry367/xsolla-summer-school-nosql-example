# Пример для лекции Xsolla School по NoSQL решениям

## Подготовка проекта
1. `composer install`
1. `docker-compose  up -d --build`
2. Накатить миграции
3. Наполнение базы данных 
   - `php runner.php generate:documents` - для примеров redis/sphinx
   - `php runner.php generate:events` - для примеров clickhouse
4. Подготовка контейнера sphinx
   1. `docker exec -it xsolla_school_sphinx bash`
   2. `searchd --config /etc/sphinxsearch/sphinx.conf`
   3. **После** наполнения mysql можем запустить индексацию:`indexer --all`

Параметры для подключения подтягиваются из `.env`, по умолчанию готовы для подключения к контейнерам, **ничего править не нужно**.

## Список примеров
- Redis - кеширование запроса
  - `php index.php redis`
- MongoDB - сохранение неструктурированных данных
  - `php index.php mongo 1`
  - `php index.php mongo 2`
- Sphinx - поиск по контенту документов
   - `php index.php sphinx`
- Clickhouse - сравнение аналитических запросов
  - `php index.php clickhouse 1`
  - `php index.php clickhouse 2`