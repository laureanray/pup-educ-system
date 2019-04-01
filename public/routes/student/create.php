<?php
include_once("../../../config/Database.php");
include_once("../../../components/Student.php");
$config = include_once('../../../config/Config.php');

$database = new Database($config['host'], $config['databases'], $config['username'], $config['password']);
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
                $student->setName($data->name);
                $student->setEmail($data->email);
                $student->setStudentNumber($data->studentNumber);
                $student->setPassword(md5($data->password));
                if ($student->create()) {
                    http_response_code(201);
                    echo json_encode(array("message" => "Entry was registered."));
                } else {
                    http_response_code(503);
                    echo json_encode(array("message" => "Unable to create an entry. Probably duplicate."));
                }
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "Unable to create an entry. Data is incomplete."));
            }
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Database Not Responding"));
        }
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Invalid API Key."));
    }
} else {
    http_response_code(503);
    echo json_encode(
        array("message" => "Unauthorized.")
    );
}
