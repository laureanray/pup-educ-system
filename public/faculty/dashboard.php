<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-6 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Announcements </h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <button class="btn btn-info"> New Announcement</button>
          </div>
          <div class="col-6">
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