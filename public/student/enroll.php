<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?php include_once "../includes/head.php" ?>
    <script src="/resources/js/enroll.js"></script>
    <title>Enroll</title>
</head>

<body>
    <div class="container">
        <form id="enrollment_form">
            <h1 class="headings-1"> Student Enrollment Form </h1>
            <div class="form-group">
                <h6 class="text-primary"> Full Name</h6>
                <div class="input-group">
                    <input type="text" placeholder="Last Name" id="last_name" autofocus class="form-control">
                    <input type="text" placeholder="First Name" id="first_name" class="form-control">
                    <input type="text" placeholder="Middle Name" id="middle_name" class="form-control">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Preferred nickname" id="nickname" class="form-control mt-1">
                </div>
            </div>
            <div class="form-group">
                <h6 class="text-primary"> Address</h6>
                <div class="input-group">
                    <input type="text" placeholder="Street Address" id="street_address" class="form-control">
                </div>

                <div class="input-group mt-1">
                    <input type="text" placeholder="City" id="city" class="form-control">
                    <input type="text" placeholder="State/Province/Region" id="state" class="form-control">
                    <input type="text" placeholder="ZIP/Postal Code" id="zip_code" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <h6 class="text-primary"> Additional Information</h6>
                <div class="input-group">
                    <input id="datepicker" width="250" placeholder="Date of Birth" />
                    <div class="input-group-prepend">
                        <label class="input-group-text ml-1" for="inputGroupSelect01">Sex </label>
                    </div>
                    <select class="custom-select" id="sex">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

            </div>
            <div class="form-group">
                <h6 class="text-primary"> Parents Information </h6>
                <div class="input-group">
                    <input type="text" id="mothers_name" placeholder="Mother's Name" autofocus class="form-control">
                    <input type="text" id="mothers_contact" placeholder="Contact Number" class="form-control">
                </div>
                <div class="input-group mt-1">
                    <input type="text" id="fathers_name" placeholder="Father's Name" autofocus class="form-control">
                    <input type="text" id="fathers_contact" placeholder=" Contact Number" class="form-control">
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted mb-3">By clicking submit, you are agreeing to our <a href="#">terms</a>. </small>
            <button type="submit" class="btn btn-primary">Submit Form </button>
        </form>
    </div>

    </div>
</body>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

</html> 