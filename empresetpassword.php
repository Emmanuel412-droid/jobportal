<?php

// Start the session
session_start();

//set connection
include("database.php");
        //if user click change password button
    if(isset($_POST['change'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $conpassword = mysqli_real_escape_string($conn, $_POST['conpassword']);
        if($password !== $conpassword){
            echo "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $update_pass = "UPDATE empregister SET code = $code, password = md5('$password') WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                echo("<script language='javascript'>window.alert('Password changed successfully!');window.location='emplogin.php';</script>");
             // header('Location: jslogin.php');
            }else{
                echo("<script language='javascript'>window.alert('Failed to change your password!');window.location='empresetpassword.php';</script>");
                // echo "Failed to change your password!";
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
    <title>Reset Password</title>
    <style>
.body{
    width: 1900px;
    height: auto;
    margin: 0;
    font-family: "Lato", sans-serif;
    font-size: 20px;
    overflow-x: hidden;
}
.error{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: #D65C4F;
display: table;
padding: 5px 8px;
font-size: 25px;
font-weight: 600;
line-height: 14px;
  }
.green{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: green;
display: table;
padding: 5px 8px;
font-size: 25px;
font-weight: 600;
line-height: 14px;
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
.sidenav {
  height: 750px;
  width: 330px;
  position: fixed;
  z-index: 1;
  top: 20px;
  left: 10px;
  margin-top: 50px;
  background: lightgreen;
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
  color: red;
}

.section {
    height:1100px;
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
    padding-left: 480px;
    background-color: grey;
}
.favour{
  display: flex;
}
/* Create  equal columns that sits next to each other */
.difav {
  flex: 25%;
  padding: 5px;
  color: black;
  text-align: center;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.footer {
    margin-left: 340px; /* Same width as the sidebar + left position in px */
    text-decoration-color: darkblue;
    background-color:lightgrey;
    color: black;
    text-align: center;
    margin-left: 340px; /* Same width as the sidebar + left position in px */
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
            let password= document.forms["changepassword"]["password"].value;
            let conpassword = document.forms["changepassword"]["conpassword"].value;

            let regPassword=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

            if (password=="" || conpassword=="") {
                alert("Form cannot be blank.Enter details correctly.");
                return false;
            }
            else if(!regPassword.test(password)){
                alert("Enter valid password.Password should have at least one lowercase letter, one uppercase letter, one numeric digit, and one special character and be of 8 to 20 characters");
                document.getElementById('password').focus();
                return false;
            }
            else if(password != conpassword) {
                alert("New password and confirm password do not match");
                return false;
            }
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>Reset Password</h1>
</div>
<div class="section">
        <form method="POST" action="empresetpassword.php" id="changepassword" name="changepassword" onsubmit="return validateForm()">
          <fieldset style="width:900px; background-color:floralwhite;">
            <legend><h2>Change Password</h2></legend>

            <h3>New Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" type="password" id="password" name="password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showNewPassword()">Show New Password

            <h3>Confirm New Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" type="password" id="conpassword" name="conpassword" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showConfirmNewPassword()">Show Confirm New Password<br><br><br>


            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 26px;" type="submit" id="change" name="change" value="RESET PASSWORD" onclick="validateForm()"><br><br>
          </fieldset>
        </form>
  </div>
<script>
        function showNewPassword() {
            var pass = document.getElementById("password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }

        function showConfirmNewPassword() {
            var cpass = document.getElementById("conpassword");
            if (cpass.type === "password") {
                cpass.type = "text";
            } else {
                cpass.type = "password";
            }
        }
</script>
</body>
</html>