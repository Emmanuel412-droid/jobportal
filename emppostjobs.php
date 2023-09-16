<?php

// Start the session
session_start();
// Check if the employer is logged in
if (!isset($_SESSION['useremployer'])) {
    // Redirect the employer to the login page
    header('Location: emplogin.php');
    exit;

}
include("database.php");

if(ISSET($_POST['post'])){
        $ename = mysqli_real_escape_string($conn, $_POST['ename']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $jobuserid = mysqli_real_escape_string($conn, $_POST['jobuserid']);
        $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
        $industries = mysqli_real_escape_string($conn, $_POST['industries']);
        $education = mysqli_real_escape_string($conn, $_POST['education']);
        $experience = mysqli_real_escape_string($conn, $_POST['experience']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
        $jobdescription = mysqli_real_escape_string($conn, $_POST['jobdescription']);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
        $county = mysqli_real_escape_string($conn, $_POST['county']);
        $town = mysqli_real_escape_string($conn, $_POST['town']);
    
        $sql = "SELECT * FROM postjob WHERE jobuserid='$jobuserid'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

            echo "Sorry... Job User ID already taken";  
      }
    else{
        //Insert into database
        $sql="INSERT INTO postjob(ename,email,jobuserid,jobtitle,industries,education,experience,salary,jobdescription,deadline,county,town) VALUES('$ename','$email','$jobuserid','$jobtitle','$industries','$education','$experience','$salary','$jobdescription','$deadline','$county','$town')" or die(mysqli_error());

        $result = mysqli_query($conn, $sql);
        if($result){
            $subject = "Job Posted";
            $message = "You have successfully posted a job where the jobtitle is $jobtitle";
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                echo("<script language='javascript'>window.alert('Job posted successfully!');window.location='emppostjobs.php';</script>");
                
                exit();
            }else{
                echo "Failed while sending code!";
            }
        }else{
            echo "Failed while inserting data into database!";
        }
    
 
    
    }}
?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Post Jobs</title>
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
.active{
    background-color: black;
}
.active:hover{
    color:red;
}
.sidenav {
    height: 1080px;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 20px;
    left: 10px;
    margin-top: 50px;
    background-color: yellow;
    overflow-x: hidden;
    padding: 8px 0;
    padding-top: 20px;
    margin-top: 80px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 17px;
  color: blue;
  display: block;
}

.sidenav a:hover {
  background-color:black;
  color: blue;
}

.section {
    height:2350px;
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    padding-left: 380px;
    text-align: center;
    background-color: grey;
}
.required:after {
    content:" *";
    color: red;
  }
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.favour{
display: flex;
}
/* Create three equal columns that sits next to each other */
.difav {
    flex: 33.33%;
    padding: 5px;
    color: black;
    text-align: center;
}
.footer {
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    height: auto;
    text-decoration-color: darkblue;
    background-color:lightgrey;
    color: black;
    text-align: center;
    font-size: 25px;
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
            let ename = document.forms["post"]["ename"].value;
            let email = document.forms["post"]["email"].value;
            let jobuserid = document.forms["post"]["jobuserid"].value;
            let jobtitle = document.forms["post"]["jobtitle"].value;
            let industries = document.forms["post"]["industries"].value;
            let education = document.forms["post"]["education"].value;
            let experience = document.forms["post"]["experience"].value;
            let salary = document.forms["post"]["salary"].value;
            let jobdescription = document.forms["post"]["jobdescription"].value;
            let deadline = document.forms["post"]["deadline"].value;
            let county = document.forms["post"]["county"].value;
            let town = document.forms["post"]["town"].value;

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;  
            let regJobUserID=/^[0-9a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            let dots = /\.([a-z\.]{2,6})/;
    
            if (ename == "" || email=="" || jobuserid =="" || jobtitle=="" || industries =="" || education=="" ||  education=="" || experience=="" || salary=="" || jobdescription=="" || deadline=="" || county=="" || town=="") {
                alert("Form cannot be blank.Enter details.");
                return false;
            }
            else if(!regFname.test(ename)){
                alert("Name should have two strings eg 'Zinc Shillete'");
                document.getElementById('ename').focus();
                return false;
            }
            else if(!symbols.test(email)){
                alert("Email should @gmail");
                document.getElementById('email').focus();
                return false;
            }
            else if(!dots.test(email)){
                alert("Email should .com");
                document.getElementById('email').focus();
                return false;
            }
             else if(!regJobUserID.test(jobuserid)){
                alert("Job User ID should be alphanumeric'");
                document.getElementById('jobuserid').focus();
                return false;
            }
            else if (jobuserid.length < 5){
                alert("Job User ID should not be less than five");
                document.getElementById("jobuserid").focus();
                return false;
            }
            else if (jobuserid.length > 8){
                alert("Job User ID should not be more than eight");
                document.getElementById("jobuserid").focus();
                return false;
            }
            else if(isNaN(experience)){
                alert("Experience should be of numeric value.");
                document.getElementById("experience").focus();
                return false;
            }
            else if (experience.length < 1){
                alert("Experience should not be less than one");
                document.getElementById("experience").focus();
                return false;
            }
            else if (experience.length > 2){
                alert("Experience should not be more than two");
                document.getElementById("experience").focus();
                return false;
            }
            else if(isNaN(salary)){
                alert("Salary should be of numeric value.");
                document.getElementById("salary").focus();
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
                alert("Postal address must not be more than five");
                document.getElementById("postal").focus();
                return false;
            }
            else if(isNaN(zip)){
                alert("Zip code should be of numeric value.Digits only");
                document.getElementById("zip").focus();
                return false;
            }
            else if (zip.length < 2){
                alert("Zip code must not be less than two");
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
    <h1>Post Jobs</h1>
</div>
<div class="sidenav">
    <img src="images/employmelogos.png" id="logo">
    <?php echo '<h3 style="text-align: center;"><big>Employer: '. $_SESSION["useremployer"] . '</big></h3>'; ?>
    <a style="text-decoration: none; font-size: 22px;" href="empdashboard.php"><span>DASHBOARD</span></a><br>
    <h3>JOBS</h3>
    <a class="active" style="text-decoration: none; font-size: 22px" href="emppostjobs.php"><span>POST JOBS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanagejobs.php">MANAGE JOBS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empapplications.php">APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageapplications.php">MANAGE APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empinterviews.php">MANAGE INTERVIEWS</a><br>
    <h3>MANAGE PROFILE</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageprofile.php"><span>PROFILE</span></a><br>
    <h3>SETTINGS</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empreports.php"><span>REPORTS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empchangepassword.php">CHANGE PASSWORD</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empaccountdetails.php">ACCOUNT DETAILS</a><br>
    <h3>EXIT</h3>
    <a style="text-decoration: none; font-size: 22px;" href="emplogout.php"><span>LOG OUT</span></a><br>
</div>
    <div class="section">
    <form method="POST" action="emppostjobs.php" id="post" name="post" onsubmit="return validateForm()">
        <fieldset style="width:900px; background-color: floralwhite;">
            <legend><h4>Post a Job</h4></legend>

            <fieldset>

            <h5><label class="required">Employer Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="ename" type="text" name="ename" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Email</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Job User ID</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jobuserid" type="text" name="jobuserid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Job Title</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jobtitle" type="text" name="jobtitle" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Industries</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="industries" id="industries" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
                <option value="">Select Industry</option>
                <option value="Advertising, Media & Communications">Advertising, Media & Communications</option>
                <option value="Agriculture, Fishing & Forestry">Agriculture, Fishing & Forestry</option>
                <option value="Automotive & Aviation">Automotive & Aviation</option>
                <option value="Banking, Finance & Insurance">Banking, Finance & Insurance</option>
                <option value="Construction">Construction</option>
                <option value="Education">Education</option>
                <option value="Energy & Utilities">Energy & Utilities</option>
                <option value="Enforcement & Security">Enforcement & Security</option>
                <option value="Entertainment, Events & Sports">Entertainment, Events & Sports</option>
                <option value="Government">Government</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Hospitality & Hotel">Hospitality & Hotel</option>
                <option value="IT & Telecoms">IT & Telecoms</option>
                <option value="Law & Compliance">Law & Compliance</option>
                <option value="Manufacturing & Warehousing">Manufacturing & Warehousing</option>
                <option value="Mining, Energy & Metals">Mining, Energy & Metals</option>
                <option value="NGO, NPO & Charity">NGO, NPO & Charity</option>
                <option value="Real Estate">Real Estate</option>
                <option value="Recruitment">Recruitment</option>
                <option value="Retail, Fashion & FMCG">Retail, Fashion & FMCG</option>
                <option value="Shopping & Logistics">Shopping & Logistics</option>
                <option value="Tourism & Travel">Tourism & Travel</option>
            </select>

            <h5><label class="required">Education</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="education" id="education" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
                <option value="">Select Level of education</option>
                <option value="PHD">PHD</option>
                <option value="Masters">Masters</option>
                <option value="Degree">Degree</option>
                <option value="Diploma">Diploma</option>
                <option value="Certificate">Certificate</option>
            </select>
            </fieldset>
            <fieldset>

            <h5><label class="required">Work Experience(Years)</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="experience" type="number" name="experience" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
            

            <h5><label class="required">Salary(Month)</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="salary" type="number" name="salary" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Job Description</label></h5>
            <textarea style="height:200px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jobdescription" name="jobdescription" rows="4" cols="50" required=""></textarea>

            <h5><label class="required">Deadline</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="deadline" type="date" min="2023-07-20" max="2023-08-30" name="deadline" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">County</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="county" id="county" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
                <option value="">Select County</option>
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
                <option value="Migori">Migori</option>
                <option value="Kisii">Kisii</option>
                <option value="Nyamira">Nyamira</option>
                <option value="Nairobi">Nairobi</option>
            </select>

            <h5><label class="required">Town</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="town" type="text" name="town" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 26px;" id="post" type="submit"  name="post" value="POST JOB" onclick="validateForm()"><br>
        </fieldset>
    </form>
</div>
<div class="footer">
    <div class="favour">
        <div class="difav">
        <a style="color:black; text-decoration:none; padding-top:20px" href="empmanageapplications.php"><h2>Manage Applications</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empinterviews.php"><h2>Manage Interviews</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empapplications.php"><h2>Job Applications</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empmanagejobs.php"><h2>Manage Jobs</h2></a>
        </div>
        <div class="difav">
        <a style="color:black; text-decoration:none; padding-top:20px" href="empchangepassword.php"><h2>Change Password</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="emppostjobs.php"><h2>Post Jobs</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empmanageprofile.php"><h2>Profile</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empreports.php"><h2>Reports</h2></a>
        </div>
    </div>
<p style="color:black;"><h3>EmployMe &copy; 2023 || All Rights Reserved.</h3></p>
</div>
</body>
</html>