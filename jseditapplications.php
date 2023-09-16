<?php
// Start the session
session_start();
// Check if the jobseeker is logged in
if (!isset($_SESSION['userjobseeker'])) {
    // Redirect the jobseeker to the login page
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
    $county = mysqli_real_escape_string($conn, $_POST['county']);
    $town = mysqli_real_escape_string($conn, $_POST['town']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $postal = mysqli_real_escape_string($conn, $_POST['postal']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
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
            $sql = "UPDATE jobapplication SET ename='$ename',jobtitle='$jobtitle',appid='$appid',jsname='$jsname',phonenumber='$phonenumber',email='$email',gender='$gender',county='$county',town='$town',dob='$dob',postal='$postal',zip='$zip',education='$education',fieldstudy='$fieldstudy',school='$school',skills='$skills',cv_coverletter='$cv_coverletter' WHERE appid='$appid'";
            if (mysqli_query($conn, $sql)) {
                echo("<script language='javascript'>window.alert('Edit successfull');window.location='jsviewapplications.php';</script>");
            }
        } else {
            echo("<script language='javascript'>window.alert('Failed to upload.');window.location='jseditapplications.php';</script>");
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
    <title>EDIT JOBS</title>
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
    background-image: url('images/forest.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
.section {
    height:2900px;
    font-size: 25px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
    background-color: slateblue;
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
            let county = document.forms["apply"]["county"].value;
            let town = document.forms["apply"]["town"].value;
            let dob = document.forms["apply"]["dob"].value;
            let postal = document.forms["apply"]["postal"].value;
            let zip = document.forms["apply"]["zip"].value;
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


            if (ename==""|| jobtitle=="" || jsname=="" || phonenumber=="" || email=="" || gender=="" || county=="" || town=="" || dob=="" || postal=="" || zip=="" || education=="" || fieldstudy=="" || school==""|| skills=="" || cv_coverletter=="") {
                alert("Form cannot be blank.Enter details.");
                return false;
            }
            else if(!regFname.test(ename)){
                alert("Employer Name should have two strings eg 'Flash Lofts'");
                document.getElementById('ename').focus();
                return false;
            }
            else if(!letter.test(jobtitle)){
                alert("Job Title should be letters only'");
                document.getElementById('jobposition').focus();
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
                return false;
            }
            else if (phonenumber.length > 10){
                alert("Phone number must have ten digits.");
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
            else if(isNaN(postal)){
                alert("Postal address should be of numeric value.Digits only");
                document.getElementById("postal").focus();
                return false;
            }
            else if (postal.length < 2){
                alert("Postal address must not be less than two");
                document.getElementById("postal").focus();
                return false;
            }
            else if (postal.length > 5){
                alert("Phone address must not be more than five");
                document.getElementById("postal").focus();
                return false;
            }
            else if(isNaN(zip)){
                alert("Zip code should be of numeric value.Digits only");
                document.getElementById("zip").focus();
                return false;
            }
            else if (zip.length < 5){
                alert("Zip code number must not be less than five");
                document.getElementById("zip").focus();
                return false;
            }
            else if (zip.length > 5){
                alert("Zip code must not be more than five");
                document.getElementById("zip").focus();
                return false;
            }
        
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>APPLY JOBS</h1>
</div>
<div class="section">
    <form enctype="multipart/form-data" method="POST" action="jsapplyjobs.php" id="apply" name="apply" onsubmit="return validateForm()">
        <fieldset style="width:800px; height: 2800px; padding-top: 60px; background-color:floralwhite;">
            <legend><h4>Apply Jobs</h4></legend>

            <h5><label class="required">Employer Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="ename" type="text" name="ename" required=""><br>

            <h5><label class="required">Job Title</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jobtitle" type="text" name="jobtitle" required=""><br>

            <h5><label class="required">Application ID</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="appid" type="text" name="appid" required=""><br>

            <h5><label class="required">Jobseeker Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jsname" type="text" name="jsname"  onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Phone Number</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Email</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

            <h5><label class="required">Gender</label></h5>
            <input style="height:30px; width:60px;" id="gender" type="radio" name="gender" value="Male" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">MALE
            <input style="height:30px; width:60px;" id="gender" type="radio" name="gender" value="Female" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false">FEMALE<br>

            <h5><label class="required">County</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="county" id="county" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
                <option value="">Select county</option>
                <option value="Mombasa">Mombasa</option>
                <option value="Kwale">Kwale</option>
                <option value="Kilifi">Kilifi</option>
                <option value="Tana River">Tana River</option>
                <option value="Lamu">Lamu</option>
                <option value="Taita Taveta">Taita Taveta</option>
                <option value="Garissa">Garissa</option>
                <option value="Wajir">Wajir</option>
                <option value="Mandera">Mandera</option>
                <option value="Marsabit">Marsabit</option>
                <option value="Isiolo">Isiolo</option>
                <option value="Meru">Meru</option>
                <option value="Tharaka Nithi">Tharaka Nithi</option>
                <option value="Embu">Embu</option>
                <option value="Kitui">Kitui</option>
                <option value="Machakos">Machakos</option>
                <option value="Makueni">Makueni</option>
                <option value="Nyandarua">Nyandarua</option>
                <option value="Nyeri">Nyeri</option>
                <option value="Kirinyaga">Kirinyaga</option>
                <option value="Muranga">Muranga</option>
                <option value="Kiambu">Kiambu</option>
                <option value="Turkana">Turkana</option>
                <option value="West Pokot">West Pokot</option>
                <option value="Samburu">Samburu</option>
                <option value="Trans Nzoia">Trans Nzoia</option>
                <option value="Uasin Gishu">Uasin Gishu</option>
                <option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
                <option value="Nandi">Nandi</option>
                <option value="Baringo">Baringo</option>
                <option value="Laikipia">Laikipia</option>
                <option value="Nakuru">Nakuru</option>
                <option value="Narok">Narok</option>
                <option value="Kajiado">Kajiado</option>
                <option value="Kericho">Kericho</option>
                <option value="Bomet">Bomet</option>
                <option value="Kakamega">Kakamega</option>
                <option value="Vihiga">Vihiga</option>
                <option value="Bungoma">Bungoma</option>
                <option value="Busia">Busia</option>
                <option value="Siaya">Siaya</option>
                <option value="Kisumu">Kisumu</option>
                <option value="Homabay">Homabay</option>
                <option valu                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       