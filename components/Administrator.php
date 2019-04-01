<?php

class Administrator {
    private $connection = null;
    private $tableName = "administrators";

    private $id;    
    private $name;
    private $username;
    private $password;
    private $registered;

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
       $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getName(){
        return $this->name;   
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;   
    }

    public function getPassword(){
        return $this->password;
    }

    public function create()
    {
        // query to insert record
        $query = "INSERT INTO " . $this->tableName .
            " SET name=:name, username=:username, password=:password";
        // prepare query
        $statement = $this->connection->prepare($query);
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":username", $this->username);
        $statement->bindParam(":password", $this->password);

        // execute query
        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    function readOne($criteria){
        $query = "SELECT * FROM " . $this->tableName . " WHERE username='$criteria'";
        $statement = $this->connection->prepare( $query );
        $statement->execute();

        if ($statement->execute()) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->registered  = $row['registered'];
            return true;
        }else {
            return false;
        }
    }

}