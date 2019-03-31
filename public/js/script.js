$(document).ready(function() {
  $("#student_login_form").submit(function(e) {
    e.preventDefault();
    let studentNumber = e.target[0].value.trim();
    let password = e.target[1].value.trim();

    if (studentNumber.length > 0 && password.length > 0) {
      $.ajax({
        type: "POST",
        url: "/routes/student/login.php",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
          api_key: "secret",
          studentNumber: studentNumber,
          password: password
        }),
        success: function(data) {
          console.log(data.message);
          if (data.message === "Success") {
            window.location = "/student/dashboard.php";
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
