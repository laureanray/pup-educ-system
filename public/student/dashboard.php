<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
    var_dump($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Student Dashboard </h1>
    <a href="./logout.php"> Logout </a>
</body>
</html>