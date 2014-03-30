<?php


namespace ts;

/**
 * TODO: seperate config out in a config file that is not in a vcs...
 * @package ts
 */
class GenericDAO
{

    protected $pdo;
    private $host;
    private $dbname;
    private $username;
    private $password;
    protected $table_prefix;

    function __construct()
    {
        global $wpdb;
        $this->configureDatabase();
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
        //print_a($sql);
        $statement = $this->pdo->query($sql);
        if (is_object($statement)):
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            //print_a($result);
            return $result;
        else:
            return false;
        endif;
    }

    private function configureDatabase()
    {
        $this->setValueIfNotDefinedByWordpress("DB_NAME", "wordpress", "dbName");
        $this->setValueIfNotDefinedByWordpress("DB_USER", "root", "username");
        $this->setValueIfNotDefinedByWordpress("DB_PASSWORD", "", "password");
        $this->setValueIfNotDefinedByWordpress("DB_HOST", "localhost", "host");
    }

    private function setValueIfNotDefinedByWordpress($constantName, $backupValue, $property)
    {
        if (defined($constantName)) {
            $this->$property = constant($constantName);
        } else {
            $this->$property = $backupValue;
        }
    }
}