<?php
session_start();


if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);  
    // var_dump($_SESSION['user']);
}

header("Location: login.php");

?>