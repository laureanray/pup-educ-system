<?php
session_start();
include(dirname(__FILE__) . "/../../../core/functions.php");
$config = include(dirname(__FILE__) . "/../../../config/Config.php");
header('Content-Type: application/json');

// if (isset($_SESSION['faculty'])) {
$response = getEnrollees();
if ($response !== false) {
    echo json_encode(json_decode($response));
} else {
    echo json_encode(array("message" => "Failed"));
}
// } else {
    // echo "NOT SET";
// }
// if ($_SERVER['REQUEST_METHOD']  !== 'POST') {
//     echo json_encode(array("message" => "Unauthorized."));
// } else {
//     $data = json_decode(file_get_contents("php://input"), true);
//     if ($data['api_key'] === $config['api_key']) {
//         $response = getEnrollees();
//         if ($response !== false) {
//             echo json_encode(json_decode($response));
//         } else {
//             echo json_encode(array("message" => "Failed"));
//         }
//     } else {
//         echo json_encode(array("message" => "Unauthorized"));
//     }
// }
