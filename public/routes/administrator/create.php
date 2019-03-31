<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../../config/Database.php");
include_once("../../../components/Student.php");

$database = new Database("localhost", "pup-educ-db", "root", "");
$data = json_decode(file_get_contents("php://input"));


if (!empty($data->api_key)) {
    if ($data->api_key === 'secret') {
if($database->connect()){
    $databaseConnection = $database->getConnection();
    $student = new Student($databaseConnection);

    if(
        !empty($data->name) &&
        !empty($data->email) &&
        !empty($data->studentNumber) &&
        !empty($data->password)

    ){

        // set product property values
        $student->setName($data->name);
        $student->setEmail($data->email);
        $student->setStudentNumber($data->studentNumber);
        $student->setPassword(md5($data->password));
        // create the product
        if ($student->create()) {
            // set response code - 201 registered
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Entry was registered."));
        }

        // if unable to create the product, tell the user
        else {
            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to create an entry. Probably duplicate."));
        }
    }
    else {
        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to create an entry. Data is incomplete."));
    }
}else {
    http_response_code(503);
    echo json_encode(
        array("message" => "Database Not Responding")
    );
}}else{
        http_response_code(503);
        echo json_encode(
            array("message" => "Invalid API Key.")
        );
}}else {
    http_response_code(503);
    echo json_encode(
        array("message" => "Unauthorized.")
    );
}
