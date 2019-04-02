<?php
include(dirname(__FILE__) . "/../config/Database.php");



// Configuraiton 
$config = include(dirname(__FILE__) . "/../config/Config.php");

// Create instance of Database class
$database = new Database($config['host'], $config['database'], $config['username'], $config['password']);


if (!$database->connect()) {
    die('Error connecting to MySQL');
} else {
    print("Connected!");
};


function enrollStudent($data)
{
    $query_string = "INSERT INTO enrollees "
};
