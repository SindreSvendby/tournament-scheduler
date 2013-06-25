<?php


namespace ts\db;


class PDOWrapper {

    function __construct($host, $dbname, $username, $password)
    {
        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }
    function run_statement($sql)
    {
        $statement = $this->pdo->query($sql);
        if ($statement != null) {
            $resultset = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $resultset;
        } else {
            return array();
        }
    }

    public function run_exec($sql)
    {
        $rows_affected = $this->pdo->exec($sql);
        return ($rows_affected > 0);
    }

}