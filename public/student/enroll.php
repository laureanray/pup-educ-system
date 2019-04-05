<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?php include_once "../faculty/head.php" ?>
    <script src="/resources/js/enroll.js"></script>
    <title>Enroll</title>
    <style>
        body,
        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="/resources/css/anim.css">
</head>

<body>
    <div class="container">
        <div class="result_success" style="display: none;">
            <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                <span class="swal2-success-line-tip"></span>
                <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>
            <h4 class="text-center text-success"> Form Submitted. </h4>
            <small class="text-muted">Go back to the home page by clicking <a href="/"> here</a>.</small>


        </div>
        <div class="result_fail" style="display: none;">
            <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
            <h4 class="text-center " style="color: #f27474" ;> Unexpected Error. </h4>

            <small class="text-muted text-center">If you want to retry click <a href="./enroll.php"> here</a>.</small>


        </div>
        <form id="enrollment_form">
            <h1 class="headings-1"> Student Enrollment Form </h1>
            <div class="form-group">
                <p class="text-danger" id="error-text"></p>
                <h6 class="text-primary"> Child's Information</h6>
                <div class="input-group">
                    <input type="text" placeholder="Last Name" id="last_name" autofocus class="form-control">
                    <input type="text" placeholder="First Name" id="first_name" class="form-control">
                    <input type="text" placeholder="Middle Name" id="middle_name" class="form-control">
                    <input type="text" placeholder="Preferred Nickname" id="nickname" class="form-control">
                </div>

                <div class="input-group mt-1">
                    <input id="datepicker" width="250" placeholder="Date of Birth" />
                    <input type="text" placeholder="Age" id="age" class="form-control ml-1">

                    <div class="input-group-prepend">
                        <label class="input-group-text " for="inputGroupSelect01">Gender </label>
                    </div>


                    <select class="custom-select" id="gender">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>


                </div>
            </div>
            <div class="form-group">
                <h6 class="text-primary"> Address</h6>
                <div class="input-group">
                    <input type="text" placeholder="Complete Address" id="address" class="form-control">
                </div>

            </div>


            <div class="form-group">
                <h6 class="text-primary"> Parents Information </h6>
                <div class="input-group">
                    <input type="text" id="mothers_name" placeholder="Mother's Name" autofocus class="form-control">
                    <input type="text" id="mothers_contact" placeholder="Contact Number" class="form-control">
                    <input type="text" id="mothers_occupation" placeholder="Occupation" class="form-control">

                </div>

                <div class="input-group mt-1">
                    <input type="text" id="fathers_name" placeholder="Father's Name" autofocus class="form-control">
                    <input type="text" id="fathers_contact" placeholder=" Contact Number" class="form-control">
                    <input type="text" id="fathers_occupation" placeholder="Occupation" class="form-control">
                </div>


                <div class="input-group mt-1">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Number of Siblings </label>
                    </div>
                    <select class="custom-select" id="number_of_siblings">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="More than 7">More than 7</option>
                    </select>
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted mb-3">By clicking submit, you are agreeing to our <a href="#">terms</a>. </small>
            <button type="submit" class="btn btn-primary" id="submitBtn">Submit Form </button>
        </form>
    </div>

    </div>
</body>
<?php include_once "../faculty/footer.php" ?>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

</html>