<!-- MODAL FOR CONFIRMING APPROVAL OF ENROLLMENT!! -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve Enrollment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="result_success" style="display: none;">
                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span>
                        <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                    </div>
                    <h4 class="text-center text-success"> Success! </h4>
                </div>
                <div class="result_fail" style="display: none;">
                    <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
                    <h4 class="text-center " style="color: #f27474" ;> Unexpected Error. </h4>
                </div>
                <div class="modal-text">
                    This will approve the application for
                    <span id="enrollee_name" class='text-primary'></span>
                    Once approved, the data will automatically be converted into student. <br><br>
                    The following credentials will be created automatically: <br>
                    Username: <span class="text-dark" id="username"> </span> <br>
                    Password: <span class="text-dark" id="password"> </span> <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="dismiss_button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="approve_button" class="btn btn-primary">Yes </button>
            </div>
        </div>
    </div>
</div>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Enrollees</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Enrollee List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display nowrap" width="100%">
                <thead class="text-dark">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Nickname</th>
                        <th>Gender</th>
                        <th> Age </th>
                        <th>Process</th>
                    </tr>
                </thead>

                <tfoot>

                </tfoot>

            </table>
        </div>
    </div>
</div>
<script>
    function format(d) {
        // `d` is the original data object for the row
        return (
            '<table class="table table-bordered table-sm ml-2" style="widath: 400px;">' +
            "<tr>" +
            "<td>Full name:</td>" +
            "<td class='text-dark'><strong>" +
            d.first_name +
            ' "' +
            d.nickname +
            '" ' +
            d.middle_name +
            " " +
            d.last_name +
            "<strong></td>" +
            "</tr>" +
            "<tr>" +
            "<td>Address</td>" +
            "<td class='text-dark'>" +
            d.address +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Date of birth</td>" +
            "<td class='text-dark'>" +
            d.date_of_birth +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Mother's Name</td>" +
            "<td class='text-dark'>" +
            d.mothers_name +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Mother's Occupation</td>" +
            "<td class='text-dark'>" +
            d.mothers_occupation +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Mother's Contact</td>" +
            "<td class='text-dark'>" +
            d.mothers_contact +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Father's Name</td>" +
            "<td class='text-dark'>" +
            d.fathers_name +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Father's Occupation</td>" +
            "<td class='text-dark'>" +
            d.fathers_occupation +
            "</td>" +
            "</tr>" +
            "<tr>" +
            "<td>Father's Contact</td>" +
            "<td class='text-dark'>" +
            d.fathers_contact +
            "</td>" +
            "</tr>" +
            "</table>" +
            "<button class='btn btn-danger ml-3 mb-3'> Delete </button>"
        );
    }

    $(document).ready(function() {
        var table = $("#example").DataTable({
            ajax: {
                url: "/routes/student/get_enrollees.php",
                dataSrc: function(json) {
                    var return_data = new Array();
                    if (json.data) {
                        for (let i = 0; i < json.data.length; i++) {
                            if (json.data[i].is_enrolled === "FALSE") {
                                let fullname_arr = json.data[i].first_name.split(" ");
                                let middlename_arr = json.data[i].middle_name.split(" ");

                                let mi = [];
                                for (let j = 0; j < middlename_arr.length; j++) {
                                    mi.push(middlename_arr[j][0].toLowerCase());
                                }

                                let initials = [];
                                for (let iter = 0; iter < fullname_arr.length; iter++) {
                                    initials.push(fullname_arr[iter][0].toLowerCase());
                                }

                                let username =
                                    initials.join("") +
                                    mi.join("") +
                                    json.data[i].last_name.toLowerCase();

                                let fullname =
                                    json.data[i].first_name + " " + json.data[i].last_name;

                                var status_ok =
                                    "<button type='button' class='approve btn btn-success btn-sm btn-block' data-id='" +
                                    json.data[i].id +
                                    "' data-toggle='modal' data-fullname='" +
                                    fullname +
                                    "' data-username='" +
                                    username +
                                    "'  data-target='#confirmModal'> Approve </button>";
                            } else {
                                var status_ok = json.data[i].is_enrolled;
                            }
                            return_data.push({
                                id: json.data[i].id,
                                first_name: json.data[i].first_name,
                                last_name: json.data[i].last_name,
                                middle_name: json.data[i].middle_name,
                                nickname: json.data[i].nickname,
                                address: json.data[i].address,
                                date_of_birth: json.data[i].date_of_birth,
                                age: json.data[i].age,
                                gender: json.data[i].gender,
                                mothers_name: json.data[i].mothers_name,
                                mothers_contact: json.data[i].mothers_contact,
                                mothers_occupation: json.data[i].mothers_occupation,
                                fathers_name: json.data[i].fathers_name,
                                fathers_contact: json.data[i].fathers_contact,
                                fathers_occupation: json.data[i].fathers_occupation,
                                number_of_siblings: json.data[i].number_of_siblings,
                                is_enrolled: json.data[i].is_enrolled,
                                status: status_ok
                            });
                        }
                    }

                    return return_data;
                }
            },
            columns: [{
                    className: "details-control",
                    orderable: false,
                    data: null,
                    defaultContent: ""
                },
                {
                    data: "id"
                },
                {
                    data: "last_name"
                },
                {
                    data: "first_name"
                },
                {
                    data: "nickname"
                },
                {
                    data: "gender"
                },
                {
                    data: "age"
                },
                {
                    data: "status"
                }
            ],
            initComplete: function(settings, json) {
                $(".approve").click(function() {
                    let id = $(this).data("id");
                    $("#enrollee_name").html($(this).data("fullname"));
                    $("#username").html($(this).data("username"));
                    $("#password").html("password");

                    let username = $(this).data("username");
                    console.log(username);
                    // Add Event Listener for YES
                    $("#approve_button").click(function() {
                        // call backend hee
                        console.log("approve " + id);
                        enroll_student(
                            id,
                            username,   
                            $(this).data("password")
                        );
                    });
                });
            }
        });



        function enroll_student(id, username, password) {
            $.ajax({
                type: "POST",
                url: "/routes/faculty/enroll_student.php",
                data: JSON.stringify({
                    api_key: api_key,
                    id: id,
                    username: username,
                    password: password
                }),
                success: function(data) {
                    $("#dismiss_button").html("Close");
                    $("#modal-text").hide();
                    $(".result_success").show();
                    $("#approve_button").hide();
                    table.ajax.reload();
                },
                error: function(error) {
                    alert(error);
                }
            });
        }

        $("#example tbody").on("click", "td.details-control", function() {
            var tr = $(this).closest("tr");
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass("shown");
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass("shown");
            }
        });


    });
</script>