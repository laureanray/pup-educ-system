<?php
include(dirname(__FILE__) . "/../config/Database.php");

function enrollStudent($data)
{
    // Get data

    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $middle_name = $data['middle_name'];
    $nickname = $data['nickname'];
    $address = $data['address'];
    $date_of_birth = $data['date_of_birth'];
    $sex = $data['sex'];
    $mothers_name = $data['mothers_name'];
    $mothers_contact = $data['mothers_contact'];
    $fathers_name = $data['fathers_name'];
    $fathers_contact = $data['fathers_contact'];

    $config = include(dirname(__FILE__) . "/../config/Config.php");
    $database = new Database($config['host'], $config['database'], $config['username'], $config['password']);
    $database->connect();
    $connection = $database->getConnection();
    $query_string = "
        INSERT INTO enrollees 
        (last_name, first_name, middle_name, nickname, address, date_of_birth,
         sex, mothers_name, mothers_contact, fathers_name, fathers_contact)
        VALUES 
        ('$last_name', '$first_name', '$last_name', '$nickname', '$address', '$date_of_birth', '$sex', 
        '$mothers_name', '$mothers_contact', '$fathers_name', '$fathers_contact')
        ";
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        if ($connection->query($query_string)) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage;
        return false;
    }
};
