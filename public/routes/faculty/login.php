<?php
session_start();
include(dirname(__FILE__) . "/../../../core/functions.php");
$config = include(dirname(__FILE__) . "/../../../config/Config.php");

if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
    echo json_encode(array("message" => "Unauthorized."));
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['api_key'] === $config['api_key']) {
        $response = loginFaculty($data);
        if ($response === "OK") {
            $_SESSION['faculty'] = $data;
            echo json_encode(array("message" => "Success"));
        } else if ($response === "WRONG_PW") {
            echo json_encode(array("message" => "Incorrect Password"));
        } else if ($response === "NOT_FOUND") {
            echo json_encode(array("message" => "Faculty Doesn't Exists"));
        }
    } else {
        echo json_encode(array("message" => "Unauthorized"));
    }
}
