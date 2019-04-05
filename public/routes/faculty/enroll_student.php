<?php
session_start();
include(dirname(__FILE__) . "/../../../core/functions.php");
$config = include(dirname(__FILE__) . "/../../../config/Config.php");

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
    echo json_encode(array("message" => "Unauthorized."));
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['api_key'] === $config['api_key']) {
        $response = enrollStudent($data);

        if ($response === "OK") {
            $_SESSION['faculty'] = $data;
            echo json_encode(array("message" => "Success"));
        } else {
            echo json_encode(array("message" => "Fail"));
        }
    } else {
        echo json_encode(array("message" => "Unauthorized"));
    }
}
