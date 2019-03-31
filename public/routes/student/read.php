<?php

include("../../../components/Student.php");
include ("../../../config/Database.php");

/*
    Setting up the header for the response
*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->api_key)) {
    if ($data->api_key === 'secret') {
        /*
    Creating an instance of the Database class. 
*/
        $database = new Database("localhost", "pup-educ-db", "laureanray", "password");

        /*
              Database Connection
            $database->connect() returns true if successful, return false if not.
             @see Database::connect()
            Getting the database connection object to be used for the Student model
        */

        if($database->connect()){
            $databaseConnection = $database->getConnection();



            /*
        Creating an instance of the Student class.
    */
            $student = new Student($databaseConnection);

            /*
        Function call read() to execute the SQL Queries, returns PDOstatement object (if successfull)
    */
            $statement = $student->read();
            $numberOfRows = $statement->rowCount();

            /*
        This checks if the query has returned result/s
    */
            if ($numberOfRows > 0) {
                $studentsArray = array();
                $studentsArray["data"] = array();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);

                    $student =  array(
                        "id" => $id,
                        "name" => $name,
                        "email" => $email,
                        "studentNumber" => $studentNumber,
                        "registered" => $registered
                    );

                    array_push($studentsArray["data"], $student);
                }

                http_response_code(200);
                echo json_encode($studentsArray);
            } else {
                // set response code - 404 Not found
                http_response_code(404);
                echo json_encode(
                    array("message" => "No students found.")
                );
            }
        }else{

            http_response_code(503);
            echo json_encode(
                array("message" => "Database Not Responding")
            );
        }


    } else {
        http_response_code(503);
        echo json_encode(
            array("message" => "Invalid API Key.")
        );
    }
} else {
    http_response_code(503);
    echo json_encode(
        array("message" => "Unauthorized.")
    );
}
