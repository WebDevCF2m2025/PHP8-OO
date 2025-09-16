<?php

class MyPDO extends PDO{


    public function query(string $query, ?int $fetchMode = null, ...$fetchModeArgs): PDOStatement|false
    {
        throw new Exception(
        "Query interdit sur ce projet, utilise les requêtes préparées");
        return false;
    }
}