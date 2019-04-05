$(document).ready(function() {
  console.log("Document is ready");
  // $("#enrollment_form").hide();
  // $(".result_fail").show();
  $("#enrollment_form").submit(function(event) {
    event.preventDefault();
    $("#submitBtn").prop("disabled", true);
    $("#submitBtn").html("Please wait.");
    /*

    TODO: 

      VALIDATIONS,
      LOADER,
      UX  DESGIN FOR FORM SUBMIT

    */
    let last_name = $("#last_name").val();
    let first_name = $("#first_name").val();
    let middle_name = $("#middle_name").val();
    let nickname = $("#nickname").val();
    let address = $("#address").val();
    let date_of_birth = $("#datepicker").val();
    let age = $("#age").val();
    let gender = $("#gender").val();
    let mothers_name = $("#mothers_name").val();
    let mothers_contact = $("#mothers_contact").val();
    let mothers_occupation = $("#mothers_occupation").val();
    let fathers_name = $("#fathers_name").val();
    let fathers_contact = $("#fathers_contact").val();
    let fathers_occupation = $("#fathers_occupation").val();
    let number_of_siblings = $("#number_of_siblings").val();

    if (
      last_name.length === 0 ||
      first_name.length === 0 ||
      middle_name.length === 0 ||
      nickname.length === 0 ||
      address.length === 0 ||
      date_of_birth.length === 0 ||
      age.length === 0 ||
      gender.length === 0 ||
      mothers_name.length === 0 ||
      mothers_contact.length === 0 ||
      mothers_occupation.length === 0 ||
      fathers_name.length === 0 ||
      fathers_contact.length === 0 ||
      fathers_occupation.length === 0 ||
      number_of_siblings.length === 0
    ) {
      $("#error-text").html("Please fill all the fields before submitting.");
      $("#submitBtn").prop("disabled", false);
      $("#submitBtn").html("Submit Form");
    } else {
      $.ajax({
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        url: "/routes/student/enroll.php",
        data: JSON.stringify({
          api_key: "1Xo2Z1nZdVhjgsER9u3pq9P4t6g6AMx8",
          last_name: last_name,
          first_name: first_name,
          middle_name: middle_name,
          nickname: nickname,
          address: address,
          date_of_birth: date_of_birth,
          age: age,
          gender: gender,
          mothers_name: mothers_name,
          mothers_contact: mothers_contact,
          mothers_occupation: mothers_occupation,
          fathers_name: fathers_name,
          fathers_contact: fathers_contact,
          fathers_occupation: fathers_occupation,
          number_of_siblings: number_of_siblings
        }),
        success: function(data) {
          if (data.message === "Success") {
            $("#enrollment_form").hide();
            $(".result_success").show();
          } else {
            $("#enrollment_form").hide();
            $(".result_fail").show();
          }
          // Redirect to success div?
          // $("#submitBtn").prop("disabled", true);
        },
        error: function(error) {
          $("#enrollment_form").hide();
          $(".result_fail").show();
        }
      });
    }
  });
});
