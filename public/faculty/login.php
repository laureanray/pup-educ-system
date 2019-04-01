<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once "../includes/head_faculty.php" ?>
    <title>Administrator Login</title>
  </head>
  <body>
      <div class="login">
        <div class="login-card">
          <h1>Faculty Login</h1>
          <p id="error-text"></p>
          <form action="" id="admin_login_form">
            <input
              type="text"
              name="username"
              placeholder="Username"
              id="username"
              autocomplete="off"
            />
            <input
              type="password"
              name="password"
              placeholder="Password"
              id="password"
            />
            <button class="button button-primary">Login</button>
          </form>
        </div>
      </div>
  </body>
</html>
