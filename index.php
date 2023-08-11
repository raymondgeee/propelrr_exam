<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css"/>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
        <form id="registrationForm">
            <div class="registration-container">
                <h1>Registration Form</h1>
                <hr>
                <div class="name-container">
                    <label>Full Name: <i class="text-muted note">Accepted special characters , and . only</i></label>
                    <input class="form-control" type="text" id="fullName" pattern="[A-Za-z.,\s]+" required/>
                </div>
                <div class="-container">
                    <label>Email Address:</label>
                    <input class="form-control" type="email" id="email" required/>
                </div>
                <div class="mobile-container">
                    <label>Mobile Number:</label>
                    <input class="form-control" type="text" id="mobile" pattern="^09[0-9]{9}$" required/>
                </div>
                <div class="bday-container">
                    <label>Date of Birth:</label>
                    <input class="form-control" type="date" id="dob" required/>
                </div>
                <div class="age-container">
                    <label>Age:</label>
                    <input class="form-control" type="text" id="age" readonly/>
                </div>
                <div class="gender-container">
                    <label>Gender:</label>
                    <select class="form-control" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="save-container">
                    <input class="btn btn-success" type="submit" value="Submit"/>
                </div>
            </div>
        </form>
    </body>
</html>
<script>
    $(document).ready(() => {
        $("#registrationForm").submit(function(event) {
            event.preventDefault();
            
            var fullName = $("#fullName").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var dob = $("#dob").val();
            var age = $("#age").val();
            var gender = $("#gender").val();

            if (!fullName.match(/^[A-Za-z.,\s]+$/) || !email.match(/^[^@]+@[^@]+\.[^@]+$/) || !mobile.match(/^09[0-9]{9}$/)) {
                alert("Please check your inputs.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "submit.php",
                data: {
                    fullName: fullName,
                    email: email,
                    mobile: mobile,
                    dob: dob,
                    age: age,
                    gender: gender
                },
                success: function(response) {
                    alert(response);
                },
                error: function() {
                    alert("Error submitting the form!");
                }
            });
        });

        $("#dob").change(function() {
            var dob = new Date($(this).val());
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            $("#age").val(age);
        });
    })
</script>
