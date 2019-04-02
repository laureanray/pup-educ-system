<?php
include(dirname(__FILE__) . "/../../../core/functions.php");



if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
    echo json_encode(array("message" => "Unauthorized."));
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    if (enrollStudent($data) === true) {
        echo json_encode(array("message" => "Success"));
    } else {
        echo json_encode(array("message" => "Failed"));
    }
}
