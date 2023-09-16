<?php
// Start the session
session_start();
// Check if the user is logged in
if (!isset($_SESSION['useremployer'])) {
    // Redirect the employer to the login page
    header('Location: emplogin.php');
    exit;
}
include("database.php");

if(ISSET($_POST['schedule'])){
        $ename = mysqli_real_escape_string($conn, $_POST['ename']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $interviewid = mysqli_real_escape_string($conn, $_POST['interviewid']);
        $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
        $jsname = mysqli_real_escape_string($conn, $_POST['jsname']);
        $interviewdate = mysqli_real_escape_string($conn, $_POST['interviewdate']);
        $starttime = mysqli_real_escape_string($conn, $_POST['starttime']);
        $endtime = mysqli_real_escape_string($conn, $_POST['endtime']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);


         $sql = "UPDATE scheduleinterview SET ename = '$ename',email='$email',interviewid='$interviewid',jobtitle = '$jobtitle',jsname='$jsname',interviewdate='$interviewdate',starttime='$starttime',endtime='$endtime',location='$location',contact ='$contact' WHERE interviewid='$interviewid'";

        $result= mysqli_query($conn, $sql);
        if($result){
            $subject = "Interview Edited";
            $message = "You have edited your interview successfully.";
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $_SESSION['email'] = $email;
                echo("<script language='javascript'>window.alert('Interview updated successfully!');window.location='empinterviews.php';</script>");
                
            }else{
                echo("<script language='javascript'>window.alert('update not successfull!');window.location='empinterviews.php';</script>");
            }
        }else{
            echo("<script language='javascript'>window.alert('Failed while inserting data into database!');window.location='empinterviews.php';</script>");
        }
    }
  
?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Schedule Interview</title>
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
.active{
    background-color: black;
}
.active:hover{
    color:red;
}
.section {
    height:1900px;
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    padding-left: 500px;
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
            let ename = document.forms["interview"]["ename"].value;
            let email = document.forms["interview"]["email"].value;
            let interviewid = document.forms["interview"]["interviewid"].value;
            let jobtitle = document.forms["interview"]["jobtitle"].value;
            let jsname = document.forms["interview"]["jsname"].value;
            let interviewdate = document.forms["interview"]["interviewdate"].value;
            let starttime = document.forms["interview"]["starttime"].value;
            let endtime = document.forms["interview"]["endtime"].value;
            let location = document.forms["interview"]["location"].value;
            let contact = document.forms["interview"]["contact"].value;

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            let regInterviewID=/^[0-9a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            let dots = /\.([a-z\.]{2,6})/;


            if (ename=="" || email=="" || interviewid=="" || jobtitle=="" || jsname == ""  || interviewdate=="" || starttime==""  || endtime=="" || location=="" || contact=="" ) {
                alert("Form cannot be blank.Enter details correctly.");
                return false;
            }
            else if(!regFname.test(ename)){
                alert("Employer name should have two strings eg 'Shuttle Flair'");
                document.getElementById('jsname').focus();
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
            else if(!regInterviewID.test(interviewid)){
                alert("Interview ID should be alphanumeric'");
                document.getElementById('interviewid').focus();
                return false;
            }
            else if (interviewid.length < 5){
                alert("Interview ID should not be less than five");
                document.getElementById("interviewid").focus();
                return false;
            }
            else if (interviewid.length > 8){
                alert("Interview ID should not be more than eight");
                document.getElementById("interviewid").focus();
                return false;
            }
            else if(!regFname.test(jsname)){
                alert("Jobseeker name should have two strings eg 'Sammy Kamau'");
                document.getElementById('jsname').focus();
                return false;
            }
            else if(isNaN(contact)){
                alert("Contact should be of numeric value.Digits only");
                document.getElementById("contact").focus();
                return false;
            }
            else if (contact.length < 10){
                alert("Contact must have ten digits");
                document.getElementById("contact").focus();
                return false;
            }
            else if (contact.length > 10){
                alert("Contact must have ten digits");
                document.getElementById("contact").focus();
                return false;
            }
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>Schedule Interview</h1>
</div>
<div class="section">
    <form method="POST" action="empeditinterviews.php"  name="interview" id="interview" onsubmit="return validateForm()">
        <fieldset style="width:900px; background-color:floralwhite;">
            <legend><h4>Schedule Interview</h4></legend>

            <h5><label class="required">Employer Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="ename" type="text" name="ename" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Email</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Interview ID</label></h5>
            <p style="color: red;"><small>Use the original interview id. Don't change it.</small></p>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="interviewid" type="text" name="interviewid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
            

            <h5><label class="required">Job Title</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jobtitle" type="text" name="jobtitle" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">JobSeeker Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jsname" type="text" name="jsname" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Interview Date</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="interviewdate" type="date" min="2023-07-20" max="2023-08-30" name="interviewdate" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Start Time</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="starttime" type="time" name="starttime" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">End Time</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="endtime" type="time" name="endtime" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Location of Interview</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="location" type="text" name="location" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
            
            <h5><label class="required">Contact for more info</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="contact" type="tel" name="contact" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 26px;" id="schedule" type="submit"  name="schedule" value="EDIT INTERVIEW" onclick="validateForm()"><br><br>
        </fieldset>
    </form>
</div>
</body>
</html>