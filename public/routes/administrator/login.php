<?php
session_start();
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
        if($database->connect()) {
            $databaseConnection = $database->getConnection();
            $student = new Student($databaseConnection);
            if( !empty($data->studentNumber)) {
                if($student->readOne($data->studentNumber)){
                    if(!empty($student->getId())){
                        
                            if(md5($data->password) === $student->getPassword()){
                                $student_arr = array(
                                    "id" =>  $student->getId(),
                                    "name" => $student->getName(),
                                    "email" => $student->getEmail(),
                                    "studentNumber" => $student->getStudentNumber(),
                                    "password" => $student->getPassword(),
                                    "registered" => $student->getRegistered()
                                  );
                                http_response_code(200);
                                echo json_encode(array("message" => "Success"));  
                                $_SESSION['user'] = $student_arr;
                            }else{
                                http_response_code(200);
                                echo json_encode(array("message" => "Wrong Password"));  
                            }
                            
                    }else{
                        http_response_code(200);
                        echo json_encode(array("message" => "Student does not exist."));
                    }                 
                } else {
                    http_response_code(200);
                    echo json_encode(array("message" => "Student does not exist."));
                }
            }
        } else {
            http_response_code(200);
            echo json_encode(array("message" => "Database Not Responding"));
        }
    } else {
        http_response_code(200);
        echo json_encode(array("message" => "Invalid API Key."));
    }
}else {
    http_response_code(200);
    echo json_encode(array("message" => "Unauthorized."));
}

?>