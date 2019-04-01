<?php

class Student
{
    private $connection;
    private $tableName = "students";

    private $id;
    private $name;
    private $email;
    private $password;
    private $studentNumber;
    private $registered;

    public function __construct($database)
    {
        $this->connection = $database;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getStudentNumber(){
        return $this->studentNumber;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRegistered(){
        return $this->registered;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->tableName;

        $statement = $this->connection->prepare($query);

        if($statement === false){
            print("Error");
            return null;
        }else {
            $statement->execute();
            return $statement;
        }
    }

    public function toString()
    {
        print(var_dump($id));
    }

    public function create()
    {
        // query to insert record
        $query = "INSERT INTO " . $this->tableName .
            " SET name=:name, email=:email, studentNumber=:studentNumber, password=:password";

        // prepare query
        $statement = $this->connection->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->studentNumber = htmlspecialchars(strip_tags($this->studentNumber));
        $this->password = htmlspecialchars(strip_tags($this->password));


        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":studentNumber", $this->studentNumber);
        $statement->bindParam(":password", $this->password);

        // execute query
        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    public function update(){
        
    }

    function readOne($criteria){

        // query to read single record
        $query = "SELECT * FROM " . $this->tableName . " WHERE email='$criteria' OR studentNumber='$criteria' LIMIT 1";

        $statement = $this->connection->prepare( $query );

        $statement->bindParam(1, $this->id);

        $statement->execute();
        if ($statement->execute()) {
            // get retrieved row
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            // set values to object properties
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->studentNumber = $row['studentNumber'];
            $this->password = $row['password'];
            $this->registered  = $row['registered'];
            return true;
        }else {
            return false;
        }
    }
}
