<?php
    // session_start();
    // if(!isset($_SESSION['faculty'])){
    //     header("Location: login.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once "../includes/head_admin.php" ?>
    <title>Dashboard</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="branding">
        <h1>PUP College of Education</h1>
      </div>

      <div class="nav-controls">
        <i class="fas fa-user-circle"></i>
        <a href="logout.php"> Logout </a>
      </div>
    </nav>
    <section id="controls">
      <div class="control-box">
        <h1 class="control-title">Profile Information</h1>
        <p class="control-description">
          Backup database to exeternal filesystme.
        </p>
      </div>
      <div class="control-box">
        <h1 class="control-title">Database</h1>
        <div class="control-group">
          <p class="control-description">
            Backup database to redundant server.
          </p>
          <button class="button button-primary">Backup Now</button>
        </div>
        <div class="control-group">
          <p class="control-description">
            Import data from external file.
          </p>
          <button class="button button-primary">Import</button>
        </div>
      </div>
      <div class="control-box">
        <h1 class="control-title">Maintenance</h1>
        <div class="control-group">
          <p class="control-description">
            Render maintenance page when site is accessed.
          </p>
          <button class="button button-danger">Maintenance Mode</button>
        </div>
        <div class="control-group">
          <p class="control-description">
            Import data from external file.
          </p>
          <button class="button button-primary">Import</button>
        </div>
      </div>
      <div class="control-box">
        <h1 class="control-title">My Credentials</h1>
        <div class="control-group">
          <p class="control-description">
            Change Password
          </p>
          <button class="button button-primary">Update Password</button>
        </div>
        <div class="control-group">
          <p class="control-description">
            Create new administrator account.
          </p>
          <button class="button button-primary">
            New Administrator Account
          </button>
        </div>
      </div>
    </section>
    <section id="queries"></section>
  </body>
</html>
