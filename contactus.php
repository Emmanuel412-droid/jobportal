<?php
//start sesion
session_start();
//database connection
include("database.php");
$toemail="cheruiyotemmanuel24@gmail.com";
    if(ISSET($_POST['contactus'])){
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $user=mysqli_real_escape_string($conn,$_POST['user']);
        $userid=mysqli_real_escape_string($conn,$_POST['userid']);
        $phonenumber=mysqli_real_escape_string($conn,$_POST['phonenumber']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $message=mysqli_real_escape_string($conn,$_POST['message']);

        $sql = "SELECT * FROM contactus WHERE userid='$userid'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

            echo "Sorry... User ID already taken";  
      }
      else{
        //Insert into database
        $sql="INSERT INTO contactus(name,user,userid,phonenumber,email,message) VALUES('$name','$user','$userid','$phonenumber','$email','$message')" or die(mysqli_error());

        $result = mysqli_query($conn, $sql);
        if($result){
            $subject = "Email Verification Code";
            $message = "Messages from users. name=$name, user=$user, phonenumber=$phonenumber,email=$email,message=$message";
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($toemail, $subject, $message, $sender)){
                echo("<script language='javascript'>window.alert('Message sent successfully!');window.location='contactus.php';</script>");
                exit();
            }else{
                echo("<script language='javascript'>window.alert('Failed while sending message!');window.location='contactus.php';</script>");
            }
        
    }
 
 
        
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.body{
    width: 1900px;
    height: auto;
    font: sans-serif;
    font-size: 30px;
    background-color: floralwhite;
}

* {
  box-sizing: border-box;
}
.header{
    background-color: blue;
    background-image: url('images/forests.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap: 5px;
    font-size: 20px;
    color: black;
}
.active{
    background-color: green;
}
.nav{
    width: 100%;
    height: auto;
    text-align: center;
    background-color: lightgrey;
    color: black;
    word-spacing: 3px;
}

/* Style the container/contact section */
.section {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  font-size: 25px;
}
.sec{
    text-align: center;
    color: black;
    font-size: 25px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.sect:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
.required:after {
    content:" *";
    color: red;
  }
.footer {
    width: 100%;
    height: auto;
    text-decoration-color: darkblue;
    background-color: lightgrey;
    color: black;
    text-align: center;
    font-size: 25px;
}
ul {
    text-decoration-color: black;
    color: white;
    padding: 20px;
    font-size: 25px;
}

    ul li {
        display:inline;
        padding:20px;
        text-decoration:white;
        color: black;

    }

        ul li a {
            text-decoration: white;
            color: black;
            font-size: 125%;
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
            var name = document.forms["contactus"]['name'].value;
            var user = document.forms["contactus"]['user'].value;
            var userid = document.forms["contactus"]['userid'].value;
            var phonenumber = document.forms["contactus"]['phonenumber'].value;
            var email = document.forms["contactus"]['email'].value;
            var message = document.forms["contactus"]['message'].value;


            var regAname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            var symbols = /@([\da-z\.-]+)/;
            var dots = /\.([a-z\.]{2,6})/;
            var regUserID=/^[0-9a-zA-Z]+$/;
            var regMessage=/^[0-9a-zA-Z]+$/;


            if (name == "" || user=="" || userid=="" || phonenumber=="" || email=="" || message=="") {
                alert("Form cannot be blank.Enter details correctly.");
                return false;
            }
            else if(!regAname.test(name)){
                alert("Name should have two strings eg 'Panther Junior'.No spaces at the end");
                document.getElementById('name').focus();
                return false;
            }
            else if(!regUserID.test(userid)){
                alert("User ID should be alphanumeric'");
                document.getElementById('userid').focus();
                return false;
            }
            else if (userid.length < 5){
                alert("User ID should not be less than five");
                document.getElementById("userid").focus();
                return false;
            }
            else if (userid.length > 8){
                alert("User ID should not be more than eight");
                document.getElementById("userid").focus();
                return false;
            }
            else if(isNaN(phonenumber)){
                alert("Phone number should be of numeric value.Digits only");
                document.getElementById("phonenumber").focus();
                return false;
            }
            else if (phonenumber.length < 10){
                alert("Phone number must have ten digits");
                document.getElementById("phonenumber").focus();
                return false;
            }
            else if (phonenumber.length > 10){
                alert("Phone number must have ten digits");
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
            else if(!regMessage.test(userid)){
                alert("Message should be alphanumeric'");
                document.getElementById('message').focus();
                return false;
            }
            
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="headerimg">
            <img src="images/employmelogos.png" id="logo">
        </div>
        <div class="headertxt">
            <h1 style="text-align:center">EMPLOYME KRUB DESTINY</h1>
        </div>
    </div>
<div class="nav">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="aboutus.php">ABOUT US</a></li>
        <li class="active"><a href="contactus.php">CONTACT US</a></li>
        <li><a href="registration.php">SIGN UP</a></li>
        <li><a href="login.php">SIGN IN</a></li>
     </ul>
</div>

<div class="section">
  <div class="sec">
    <h1>Contact Us</h1>
    <h2>Leave us a message</h2>
  </div>
  <div class="sect">
    <div class="column">
      <img src="images/map.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="contactus.php" method="post"  name="contactus" id="contactus" onsubmit="return validateForm()">
            <fieldset>
                <legend style="color:brown;"><h2>Personal Details</h2></legend>

                <h3><label class="required">Name</label></h3>
                <input style="height:50px; width:300px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="name" type="text" name="name" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

                <h3><label class="required">User</label></h3>
                <select style="height:50px; width:300px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="user" id="user" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
                <option value="">Select User</option>
                <option value="Employer">Employer</option>
                <option value="Jobseeker">Jobseeker</option>
                </select><br>

                <h3><label class="required">User ID</label></h3>
                <input style="height:50px; width:300px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="userid" type="text" name="userid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false"  required=""><br>

                <h3><label class="required">Phone Number</label></h3>
                <input style="height:50px; width:300px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false"  required=""><br>


                <h3><label class="required">Email</label></h3>
                <input style="height:50px; width:300px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>

                <h3><label class="required">Message</label></h3>
                <textarea style="height:220px; width:300px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="message" type="description" name="message" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""></textarea><br><br>

                <input style="height:50px; width:300px; border: 1px hidden; background-color: lightgreen; color: blue; font-size: 26px;" id="contactus" name="contactus" type="submit" value="Send Message"  onclick="validateForm()">
            </fieldset>
            <fieldset>
            <legend style="color:brown;"><h2>For More</h2></legend>
            <h2><big>For quick assistance</h2>
            <h3>Email: cheruiyotemmanuel24@gmail.com</h3>
            <h3>Tel: +254769630054</h3>
        </fieldset>
        </form>
    </div>
</div>
  </div>
</div>
<div class="footer">
    <ul>
        <li><a href="privacypolicy.php">PRIVACY POLICY</a></li>
        <li><a href="termsandconditions.php">TERMS AND CONDITIONS</a></li>
    </ul>
    <p>EmployMe &copy; 2023. All Rights Reserved.</p>
</div>

</body>
</html>
