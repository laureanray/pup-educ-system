<?php

/**
 * Class Database
 */
class Database {
    private $host;
    private $databaseName;
    private $username;
    private $password;
    private $connection = null;

    /**
     * Database constructor.
     * @param $host
     * @param $databaseName
     * @param $username
     * @param $password
     * @param null $connection
     */
    public function __construct($host, $databaseName, $username, $password)
    {
        $this->host = $host;
        $this->databaseName = $databaseName;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }


    /**
     * @return bool
     */
    public function connect(){
        try {
            $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->databaseName, $this->username, $this->password);
            return true;
        }catch(PDOException $exception){
            print   ("Connection Error: " . $exception->getMessage());
            return false;
        }
    }





}