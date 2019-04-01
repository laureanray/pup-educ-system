<?php
session_start();


include_once("../../../config/Database.php");
include_once("../../../components/Administrator.php");

$config = include("../../../config/Config.php");
$database = new Database($config['host'], $config['database'], $config['username'], $config['password']);   
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->api_key)) {
    if ($data->api_key === $config['api_key']) {
        if($database->connect()) {
            $databaseConnection = $database->getConnection();
            $admin = new Administrator($databaseConnection);
            if( !empty($data->username)) {
                if($admin->readOne($data->username)){
                    if(!empty($admin->getId())){
                            if(md5($data->password) === $admin->getPassword()){
                                $admin_arr = array(
                                    "id" =>  $admin->getId(),
                                    "name" => $admin->getName(),
                                    "username" => $admin->getUsername(),
                                    "password" => $admin->getPassword(),
                                  );
                                http_response_code(200);
                                echo json_encode(array("message" => "Success"));  
                                $_SESSION['admin'] = $admin_arr;
                            }else{
                                http_response_code(200);
                                echo json_encode(array("message" => "Wrong Password"));  
                            }
                            
                    }else{
                        http_response_code(200);
                        echo json_encode(array("message" => "Admin does not exist."));
                    }                 
                } else {
                    http_response_code(200);
                    echo json_encode(array("message" => "Admin does not exist."));
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