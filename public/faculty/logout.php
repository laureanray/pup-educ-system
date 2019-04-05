<?php
session_start();


if (isset($_SESSION['faculty'])) {
    unset($_SESSION['faculty']);
    // var_dump($_SESSION['user']);
}

header("Location: /login.php");
