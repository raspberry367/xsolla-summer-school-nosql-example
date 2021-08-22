CREATE TABLE IF NOT EXISTS default.events (
      time DateTime,
      app_id Int32,
      event String,
      message String
) ENGINE = MergeTree() -- Движок
    PARTITION BY toYYYYMM(time) -- Партиции
      ORDER BY (app_id, toDate(time)) -- Первичный ключ/Ключ сортировки