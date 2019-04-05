<!-- MODAL FOR CONFIRMING DELETEION FOF ANOEINEIt jnT!! -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
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
        <div id="modal-text">
          Are you sure you want to delete announcement with the title <span id="title" class="text-danger"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="dismiss_button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="delete_button" class="btn btn-primary">Yes </button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="new_announcement_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="create_success" style="display: none;">
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
        <div id="create_fail" style="display: none;">
          <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
          <h4 class="text-center " style="color: #f27474" ;> Unexpected Error. </h4>
        </div>
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-dark">Announcement Title</label>
            <input type="text" id="announcement_title" class="form-control" placeholder="Title">
          </div>
          <div id="trumbowyg-demo"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="post_announcement_button" class="btn btn-info">Post Announcement</button>
      </div>
    </div>
  </div>
</div>



<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Announcements </h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#new_announcement_modal">
              <i class="fas fa-plus"></i>
              New Announcement
            </button>
          </div>
          <div class="col-6">

          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="table-responsive">
              <table id="announcements_table" class="display nowrap" width="100%">
                <thead class="text-dark">
                  <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Posted</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <h4 class="small font-weight-bold">Full Name <span class="float-right"></span></h4>
            <p class="text-dark">
              <?php echo $faculty_data['last_name'] ?>,
              <?php echo $faculty_data['first_name'] ?>
              <?php echo $faculty_data['middle_name'] ?>
            </p>
            <h4 class="small font-weight-bold">Username <span class="float-right"></span></h4>
            <p class="text-dark">
              <?php echo $faculty_data['username'] ?>
            </p>
            <button class="btn btn-primary"> Update Profile </button>
          </div>
          <div class="col-6">
            <img src="/resources/data/user.jpg" class="rounded w-50 img-fluid float-right" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  let author_id = <?php echo $faculty_data['id']; ?>;

  $('#trumbowyg-demo').trumbowyg();

  // POST ANNOUNCEMENT

  $("#post_announcement_button").click(function() {
    console.log('post was cliced');
    // get values

    let announcement_title = $("#announcement_title").val();
    let announcement_body = $("#trumbowyg-demo").html();

    console.log(announcement_body);

    $.ajax({
      type: 'POST',
      url: "/routes/announcements/create_announcement.php",
      data: JSON.stringify({
        title: announcement_title,
        content: announcement_body,
        author_id,
        author_id
      }),
      success: function(data) {
        if (data.message === 'Success') {

        }
      },
      error: function(error) {
        alert(error);
      }
    })
  });

  // DATAT ABLEE
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

  function delete_announcement(id) {
    $.ajax({
      type: 'POST',
      url: '/routes/announcements/delete_announcement.php',
      data: JSON.stringify({
        id: id
      }),
      success: function(data) {
        console.log(data);
        if (data.message === 'Success') {
          $("#modal-text").hide();
          $(".result_success").show();
          $("#delete_button").hide();
          $("#dismiss_button").html("Close");
          table.ajax.reload();
        }
      },
      error: function(error) {
        alert(error);
      }
    })
  }


  var table = $("#announcements_table").DataTable({
    ajax: {
      url: "/routes/announcements/get_announcements.php",
      dataSrc: function(json) {
        var return_data = new Array();

        if (json.data) {
          for (let i = 0; i < json.data.length; i++) {
            return_data.push({
              id: json.data[i].id,
              title: json.data[i].title,
              author: json.data[i].first_name + ' ' +
                json.data[i].last_name,
              updated: json.data[i].updated,
              edit: "<button class='btn btn-warning btn-sm btn-block'> Edit </button>",
              delete: "<button type='button' class='delete btn btn-danger btn-sm btn-block' data-id='" +
                json.data[i].id +
                "' data-title='" + json.data[i].title + "' data-toggle='modal' data-target='#confirmDelete'> Delete </button>"
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
        data: "title"
      },
      {
        data: "author"
      },
      {
        data: "updated"
      },
      {
        data: "edit"
      },
      {
        data: "delete"
      }
    ],
    drawCallback: function(settings) {
      $(".delete").click(function() {
        let id = $(this).data("id");
        let title = $(this).data("title");
        $("#title").html(title);
        $("#delete_button").click(function() {
          // call backend hee
          console.log("delete " + id);
          delete_announcement(
            id
          );
        });
      });
    }
  });



  $("#announcements_table tbody").on("click", "td.details-control", function() {
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
</script>