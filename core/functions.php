<?php
include(dirname(__FILE__) . "/../config/Database.php");

function connectToSQL()
{
    $config = include(dirname(__FILE__) . "/../config/Config.php");
    $database = new Database($config['host'], $config['database'], $config['username'], $config['password']);
    $database->connect();
    return $database->getConnection();
}



function enrollStudent($data)
{

    $id = $data['id'];
    $username = $data['username'];
    $password = $data['password'];


    var_dump($data);
    $connection = connectToSQL();
    $query_string = "SELECT * FROM enrollees where id='$id' LIMIT 1";
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $data = $connection->query($query_string)->fetch();
        if ($data) {
            $date = date('m/d/Y h:i:s a', time());
            $update_query = "UPDATE enrollees SET is_enrolled='$date' WHERE id='$id'";

            try {
                $update_result = $connection->query($update_query);
                if ($update_result) {
                    // var_dump($update_result);
                    // var_dump($data);
                    if (create_student($data, $username, $password)) {
                        print("SUCCESS!");
                        return true;
                    } else {
                        print("NGEK");
                        return false;
                    }
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}





function create_student($data, $username, $password)
{
    print("DATA");
    print($data['first_name']);
    // var_dump($data['first_name']);
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $middle_name = $data['middle_name'];
    $nickname = $data['nickname'];
    $address = $data['address'];
    $date_of_birth = $data['date_of_birth'];
    $age = $data['age'];
    $gender = $data['gender'];
    $mothers_name = $data['mothers_name'];
    $mothers_contact = $data['mothers_contact'];
    $mothers_occupation = $data['mothers_occupation'];
    $fathers_name = $data['fathers_name'];
    $fathers_contact = $data['fathers_contact'];
    $fathers_occupation = $data['fathers_occupation'];
    $number_of_siblings = $data['number_of_siblings'];
    $hashed_pw = md5($password);
    $connection = connectToSQL();
    date_default_timezone_set('Asia/Singapore');
    $date_of_enrollment = date('m/d/Y h:i:s a', time());
    $query_string = "
    INSERT INTO students 
    (last_name, first_name, middle_name, nickname, address, date_of_birth, age, gender, mothers_name, 
    mothers_contact, mothers_occupation, fathers_name, fathers_contact, fathers_occupation, number_of_siblings, username, password, date_enrolled)
    VALUES 
    ('$last_name', '$first_name', '$middle_name', '$nickname', '$address', '$date_of_birth','$age', '$gender', 
    '$mothers_name', '$mothers_contact', '$mothers_occupation', '$fathers_name', '$fathers_contact', '$fathers_occupation',
    '$number_of_siblings', '$username', '$hashed_pw', '$date_of_enrollment' )
    ";
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        if ($connection->query($query_string)) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function create_enrollee($data)
{
    // Get data

    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $middle_name = $data['middle_name'];
    $nickname = $data['nickname'];
    $address = $data['address'];
    $date_of_birth = $data['date_of_birth'];
    $age = $data['age'];
    $gender = $data['gender'];
    $mothers_name = $data['mothers_name'];
    $mothers_contact = $data['mothers_contact'];
    $mothers_occupation = $data['mothers_occupation'];
    $fathers_name = $data['fathers_name'];
    $fathers_contact = $data['fathers_contact'];
    $fathers_occupation = $data['fathers_occupation'];
    $number_of_siblings = $data['number_of_siblings'];

    $connection = connectToSQL();
    $query_string = "
    INSERT INTO enrollees 
    (last_name, first_name, middle_name, nickname, address, date_of_birth, age, gender, mothers_name, 
    mothers_contact, mothers_occupation, fathers_name, fathers_contact, fathers_occupation, number_of_siblings)
    VALUES 
    ('$last_name', '$first_name', '$middle_name', '$nickname', '$address', '$date_of_birth','$age', '$gender', 
    '$mothers_name', '$mothers_contact', '$mothers_occupation', '$fathers_name', '$fathers_contact', '$fathers_occupation',
    '$number_of_siblings')
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

function getStudents()
{
    $connection = connectToSQL();
    $query_string = "
    SELECT * FROM students; 
";
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $data = $connection->query($query_string)->fetchAll(PDO::FETCH_ASSOC);
        if ($data) {
            return json_encode(array("data" => $data));
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function createFaculty($data)
{

    $last_name = $data['last_name'];
    $first_name = $data['first_name'];
    $middle_name = $data['middle_name'];
    $email = $data['email'];
    $username = $data['username'];
    $password = md5($data['password']);
    $connection = connectToSQL();

    $query_string = "
    INSERT INTO faculties 
    (last_name, first_name, middle_name, email, username, password)
    VALUES 
    ('$last_name', '$first_name', '$middle_name', '$email', '$username', '$password')
";

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $statement = $connection->query($query_string);
        if ($statement) {
            echo "SUCCESS";
        } else {
            echo "FAILED";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function loginFaculty($data)
{

    $email = $data['email'];
    $password = $data['password'];
    $connection = connectToSQL();

    $query_string = "
    SELECT password FROM faculties WHERE email='$email' LIMIT 1 
";
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $result = $connection->query($query_string)->fetch();
        if ($result) {
            if ($result['password'] === md5($password)) {
                return "OK";
            } else {
                return "WRONG_PW";
            }
        } else {
            return "NOT_FOUND";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function getFacultyData($email)
{
    $connection = connectToSQL();

    $query_string = "
    SELECT * FROM faculties WHERE email='$email' LIMIT 1 
";

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $result = $connection->query($query_string)->fetch();
        if ($result) {
            return $result;
        } else {
            return "NOT_FOUND";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function getEnrollees()
{
    $connection = connectToSQL();
    $query_string = "
    SELECT * FROM enrollees 
";

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $data = $connection->query($query_string)->fetchAll(PDO::FETCH_ASSOC);
        if ($data) {
            return json_encode(array("data" => $data));
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}


function createDefaultFaculty()
{
    createFaculty(array(
        "last_name" => "Bahala",
        "first_name" => "Laurean Ray",
        "middle_name" => "Salvan",
        "email" => "laureanraybahala@gmail.com",
        "username" => "laureanray",
        "password" => "password",
    ));
}
