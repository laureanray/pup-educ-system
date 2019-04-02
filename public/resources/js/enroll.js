$(document).ready(function() {
  console.log("Document is ready");

  $("#enrollment_form").submit(function(event) {
    event.preventDefault();
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
    let street_address = $("#street_address").val();
    let city = $("#city").val();
    let state = $("#state").val();
    let zip_code = $("#zip_code").val();
    let date_of_birth = $("#datepicker").val();
    let sex = $("#sex").val();
    let mothers_name = $("#mothers_name").val();
    let mothers_contact = $("#mothers_contact").val();
    let fathers_name = $("#fathers_name").val();
    let fathers_contact = $("#fathers_contact").val();
    let address = street_address + ", " + state + ", " + zip_code;

    $.ajax({
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      url: "/routes/student/enroll.php",
      data: JSON.stringify({
        last_name: last_name,
        first_name: first_name,
        middle_name: middle_name,
        nickname: nickname,
        address: address,
        date_of_birth: date_of_birth,
        sex: sex,
        mothers_name: mothers_name,
        mothers_contact: mothers_contact,
        fathers_name: fathers_name,
        fathers_contact: fathers_contact
      }),x
      success: function(data) {
        alert(data.message);
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
});
