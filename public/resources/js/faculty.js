$(document).ready(function() {
  console.log("Ready");

  $("#faculty_login_form").submit(function(e) {
    e.preventDefault();

    let email = e.target[0].value.trim();
    let password = e.target[1].value.trim();

    if (email.length > 0 && password.length > 0) {
      $.ajax({
        type: "POST",
        url: "/routes/faculty/login.php",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
          api_key: "1Xo2Z1nZdVhjgsER9u3pq9P4t6g6AMx8",
          email: email,
          password: password
        }),
        success: function(data) {
          if (data.message === "Success") {
            window.location = "/faculty/index.php?page=dashboard";
          } else {
            $("#error-text").html(data.message);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    } else {
      $("#error-text").html("Please fill all the fields.");
    }
  });
});
