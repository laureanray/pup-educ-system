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

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection): void
    {
        $this->connection = $connection;
        }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getStudentNumber()
    {
        return $this->studentNumber;
    }

    /**
     * @param mixed $studentNumber
     */
    public function setStudentNumber($studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    /**
     * @return mixed
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param mixed $registered
     */
    public function setRegistered($registered): void
    {
        $this->registered = $registered;
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
