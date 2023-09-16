<?php
// Start the session
session_start();
// Check if the jobseeker is logged in
if (!isset($_SESSION['userjobseeker'])) {
    // Redirect the jobseekerto the login page
    header('Location: jslogin.php');
    exit;
}


// connect to the database
include("database.php");

// Uploads files
if (isset($_POST['apply'])) { // if save button on the form is clicked
    // name of the uploaded file
    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $appid = mysqli_real_escape_string($conn, $_POST['appid']);
    $jsname = mysqli_real_escape_string($conn, $_POST['jsname']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $fieldstudy = mysqli_real_escape_string($conn, $_POST['fieldstudy']);
    $school = mysqli_real_escape_string($conn, $_POST['school']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $cv_coverletter = $_FILES['cv_coverletter']['name'];


    // destination of the file on the server
    $target = 'CV_CoverLetter/' . $cv_coverletter;

    // get the file extension
    $extension = pathinfo($cv_coverletter, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['cv_coverletter']['tmp_name'];
    $size = $_FILES['cv_coverletter']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo("<script language='javascript'>window.alert('You file extension must be .pdf');window.location='jsapplyjobs.php';</script>");
    } elseif ($_FILES['cv_coverletter']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo("<script language='javascript'>window.alert('File too large!');window.location='jsapplyjobs.php';</script>");
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $target)) {
            $sql = "INSERT INTO jobapplication(ename,jobtitle,appid,jsname,phonenumber,email,gender,education,fieldstudy,school,skills,cv_coverletter)VALUES('$ename','$jobtitle','$appid','$jsname','$phonenumber','$email','$gender','$education','$fieldstudy','$school','$skills','$cv_coverletter')";
            if (mysqli_query($conn, $sql)) {
                $subject = "Job Application";
                $message = "You have applied for a job as $jobtitle posted by $ename. Your application id is $appid.";
                $sender = "From: cheruiyotemmanuel24@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo("<script language='javascript'>window.alert('Job applied successfull');window.location='jsmanagejobs.php';</script>");
                exit();
            }
            }
        } else {
            echo("<script language='javascript'>window.alert('Failed to apply.');window.location='jsapplyjobs.php';</script>");
        }
    }
}

?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Apply Jobs</title>
    <style>
.body{
    width: 1900px;
    height: auto;
    margin: 0;
    font-family: "Lato", sans-serif;
    font-size: 20px;
    overflow-x: hidden;
}
.header {
    width: 100%;
    height: 80px;
    background-color:lightgrey;
    color: black;
    text-align: center;
    background-image: url('images/forests.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
.section {
    height: 2200px;
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
    background-color: grey;
    padding-left: 600px;
}.sector {
  display: flex;
}
/* Create  equal columns that sits next to each other */
.dissect {
  flex: 50%;
  padding: 5px;
  color: black;
  text-align: center;
}
.required:after {
    content:" *";
    color: red;
  }
.footer {
    width: 100%;
    height: auto;
    text-decoration-color: darkblue;
    background-color:lightgrey;
    color: black;
    text-align: center;
}
ul {
    text-decoration-color: black;
    color: white;
    padding: 10px;
}

    ul li {
        display:inline;
        padding:10px;
        text-decoration:white;
        color: black;

    }

        ul li a {
            text-decoration: white;
            color: black;
            font-size: 95%;
            padding:50px;
        }

            ul li a:hover {
                text-decoration-color: red;
                display: inline;
                color:red;
            }
         
    </style>
    <script type="text/javascript">
        function validateForm() {
            let ename = document.forms["apply"]["ename"].value;
            let jobtitle = document.forms["apply"]["jobtitle"].value;
            let appid = document.forms["apply"]["appid"].value;
            let jsname = document.forms["apply"]["jsname"].value;
            let phonenumber = document.forms["apply"]["phonenumber"].value;
            let email = document.forms["apply"]["email"].value;
            let gender = document.forms["apply"]["gender"].value;
            let education = document.forms["apply"]["education"].value;
            let fieldstudy = document.forms["apply"]["fieldstudy"].value;
            let school = document.forms["apply"]["school"].value;
            let skills = document.forms["apply"]["skills"].value;
            let cv_coverletter = document.forms["apply"]["cv_coverletter"].value;
 

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            let regAppID=/^[0-9a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            let dots = /\.([a-z\.]{2,6})/;
            let letters = /^[A-Za-z]+$/;


            if (ename==""|| jobtitle=="" || appid=="" || jsname=="" || phonenumber=="" || email=="" || gender=="" ||  education=="" || fieldstudy=="" || school==""|| skills=="" || cv_coverletter=="") {
                alert("Form cannot be blank.Enter details.");
                return false;
            }
            else if(!regFname.test(ename)){
                alert("Employer Name should have two strings eg 'Flash Lofts'");
                document.getElementById('ename').focus();
                return false;
            }
            else if(!regAppID.test(appid)){
                alert("Application ID should be alphanumeric'");
                document.getElementById('appid').focus();
                return false;
            }
            else if (appid.length < 5){
                alert("Application ID should not be less than five");
                document.getElementById("appid").focus();
                return false;
            }
            else if (appid.length > 8){
                alert("Application ID should not be more than eight");
                document.getElementById("appid").focus();
                return false;
            }
            else if(!regFname.test(jsname)){
                alert("Jobseeker Name should have two strings eg 'Panther Junior'");
                document.getElementById('jsname').focus();
                return false;
            }
            else if(isNaN(phonenumber)){
                alert("Phone number should be of numeric value.Digits only");
                document.getElementById("phonenumber").focus();
                return false;
            }
            else if (phonenumber.length < 10){
                alert("Phone number must have ten digits.");
                document.getElementById("phonenumber").focus();
                return false;
            }
            else if (phonenumber.length > 10){
                alert("Phone number must have ten digits.");
                document.getElementById("phonenumber").focus();
                return false;
            }
            else if(!symbols.test(email)){
                alert("Email should have @gmail");
                document.getElementById('email').focus();
                return false;
            }
            else if(!dots.test(email)){
                alert("Email should have .com");
                document.getElementById('email').focus();
                return false;
            }
        
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>Apply Jobs</h1>
</div>
<div class="section">
    <form enctype="multipart/form-data" method="POST" action="jsapplyjobs.php" id="apply" name="apply" onsubmit="return validateForm()">
        <fieldset style="width:800px; height: 2000px; padding-top: 30px; background-color:floralwhite;">
            <legend><h4>Apply Jobs</h4></legend>

            <h5><label class="required">Employer Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="ename" type="text" name="ename" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Job Title</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jobtitle" type="text" name="jobtitle" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Application ID</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="appid" type="text" name="appid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Jobseeker Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jsname" type="text" name="jsname"  onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Phone Number</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Email</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Gender</label></h5>
            <input style="height:30px; width:60px;" id="gender" type="radio" name="gender" value="Male" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">MALE
            <input style="height:30px; width:60px;" id="gender" type="radio" name="gender" value="Female" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false">FEMALE<br>

            <h5><label class="required">Education</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="education" id="education" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
                <option value="">Select Level of education</option>
                <option value="PHD">PHD</option>
                <option value="Masters">Masters</option>
                <option value="Degree">Degree</option>
                <option value="Diploma">Diploma</option>
                <option value="Certificate">Certificate</option>
            </select>

            <h5><label class="required">Field Study</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="fieldstudy" type="text" name="fieldstudy"  onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">School</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="school" type="text" name="school"  onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Skills</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="skills" type="text" name="skills"  onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">CV and CoverLetter</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="cv_coverletter" type="file" name="cv_coverletter"  onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 26px;" id="apply" type="submit"  name="apply" value="APPLY JOBS" onclick="validateForm()">
        </fieldset>
    </form>
</div>
</body>
</html>

            