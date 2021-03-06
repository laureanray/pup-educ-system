<?php
include(dirname(__FILE__) . "/../../../core/functions.php");
$config = include(dirname(__FILE__) . "/../../../config/Config.php");

if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
    echo json_encode(array("message" => "Unauthorized."));
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['api_key'] === $config['api_key']) {
        if (create_enrollee($data) === true) {
            echo json_encode(array("message" => "Success"));
        } else {
            echo json_encode(array("message" => "Failed"));
        }
    } else {
        echo json_encode(array("message" => "Unauthorized"));
    }
}
