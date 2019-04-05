<?php
session_start();
include(dirname(__FILE__) . "/../../../core/functions.php");
$config = include(dirname(__FILE__) . "/../../../config/Config.php");
header('Content-Type: application/json');

// if (isset($_SESSION['faculty'])) {
$response = getStudents();
if ($response !== false) {
    echo json_encode(json_decode($response));
} else {
    echo json_encode(array("message" => "Failed"));
}
 