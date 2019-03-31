<?php

class Administrator {
    private $connection = null;
    private $tableName = "administrators";

    private $name;
    private $username;
    private $password;

    /**
     * Administrator constructor.
     * @param null $connection
     * @param string $tableName
     * @param $name
     * @param $username
     * @param $password
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }


    public function setName($name){
        $this->name = $name;   
    }

    public function setUsername($username){
        return $this->username;   
    }

    public function setPassword($password){
        return $this->password;   
    }

    public function getName(){
        return $this->name;   
    }

    public function getUsername(){
        return $this->username;   
    }

    public function getPassword(){
        return $this->password'
    }

}