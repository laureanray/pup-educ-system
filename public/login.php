<?php
session_start();
if (isset($_SESSION['faculty'])) {
    header("Location: faculty/index.php?page=dashboard");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>COLC - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <script src="/resources/js/jquery-3.3.1.min.js"></script>
    <script src="/resources/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/resources/css/bootstrap.css" />
    <link rel="stylesheet" href="/resources/css/styles.css" />
    <script src="/resources/js/faculty.js"></script>
</head>

<body>
    <div style="height: 100vh" class="container d-flex justify-content-center align-items-center">
        <form id="faculty_login_form">
            <h3 class="text-primary">Login</h3>
            <p class="text-danger" id="error-text"></p>
            <div class=" form-group">
                <label>Email address</label>
                <input type="email" class="form-control" aria-describedby="Email" autocomplete="email" placeholder="Enter email" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" autocomplete="password" placeholder="Password" />
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</body>

</html>