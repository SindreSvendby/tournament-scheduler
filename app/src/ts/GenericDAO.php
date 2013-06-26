<?php


namespace ts;

class GenericDAO
{

    protected $pdo;
    private $host;
    private $dbname;
    private $username;
    private $password;
    protected  $table_prefix;

    function __construct()
    {
        global $wpdb;
        //TODO: Fix hardcoding
        //TODO: Do static
        $this->dbname = "test";
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->table_prefix = $wpdb->prefix;

        if ($this->pdo == null):
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        endif;
    }

    /**
     * @param $sql string the select to run
     * @return array|bool returns the complete result set, false if none
     */
    protected function fetchAll($sql)
    {
        $statement = $this->pdo->query($sql);
        if (is_object($statement)):
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        else:
            return false;
        endif;
    }
}