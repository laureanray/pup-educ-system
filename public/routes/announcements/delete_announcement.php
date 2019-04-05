<?php
session_start();
include(dirname(__FILE__) . "/../../../core/functions.php");
$config = include(dirname(__FILE__) . "/../../../config/Config.php");
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
    echo json_encode(array("message" => "Unauthorized."));
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    if (deleteAnnouncement($data['id']) === true) {
        echo json_encode(array("message" => "Success"));
    } else {
        echo json_encode(array("message" => "Failed"));
    }
}
