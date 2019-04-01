$(document).ready(function() {
  console.log("Ready");
  $("#faculty_login_form").submit(function(e) {
    e.preventDefault();

    let username = e.target[0].value.trim();
    let password = e.target[1].value.trim();

    if (username.length > 0 && password.length > 0) {
      $.ajax({
        type: "POST",
        url: "/routes/administrator/login.php",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
          api_key: "1Xo2Z1nZdVhjgsER9u3pq9P4t6g6AMx8",
          username: username,
          password: password
        }),
        success: function(data) {
          console.log(data.message);
          if (data.message === "Success") {
            window.location = "/faculty/dashboard.php";
          } else {
            $("#error-text").html(data.message);
          }
        },
        error: function(error) {}
      });
    } else {
      $("#error-text").html("Please fill all the fields.");
    }
  });
});
