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

  if(isset($_POST['change'])):
  extract($_POST);
  if($old_password!="" && $password!="" && $confirm_pwd!="") :
    $session=$_SESSION["useremployer"];
  $old_pwd=md5(mysqli_real_escape_string($conn,$_POST['old_password']));
  $pwd=md5(mysqli_real_escape_string($conn,$_POST['password']));
  $c_pwd=md5(mysqli_real_escape_string($conn,$_POST['confirm_pwd']));
  if($pwd == $c_pwd) :
  if($pwd!=$old_pwd) :
    $sql="SELECT * FROM `empregister` WHERE  `password` ='$old_pwd' and ename='$session'";
    $db_check=$conn->query($sql);
    $count=mysqli_num_rows($db_check);
  if($count==1) :
    $fetch=$conn->query("UPDATE `empregister` SET `password` = '$pwd' where ename='$session'");
    $old_password=''; $password =''; $confirm_pwd = '';
    $msg_sucess = "Your new password updated successfully.";
  else:
    $error = "The password you gave is incorrect.";
  endif;
  else :
    $error = "Old password new password same Please try again.";
  endif;
  else:
    $error = "New password and confirm password do not matched";
  endif;
  else :
    $error = "Please fil all the fields";
  endif;   
  endif;
?> 
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Change Password</title>
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
    height:1100px;
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
    padding-left: 350px;
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
            let old_password = document.forms["changepassword"]["old_password"].value;
            let password = document.forms["changepassword"]["password"].value;
            let confirm_pwd = document.forms["changepassword"]["confirm_pwd"].value;

            let regPassword=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

            if (old_password=="" || password=="" || confirm_pwd=="") {
                alert("Form cannot be blank.Enter details correctly.");
                return false;
            }
            else if(!regPassword.test(password)){
                alert("Enter valid password.Password should have at least one lowercase letter, one uppercase letter, one numeric digit, and one special character and be of 8 to 20 characters");
                document.getElementById('password').focus();
                return false;
            }
            else if(password != confirm_pwd) {
                alert("New password and confirm password do not match");
                return false;
            }
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>Change Password</h1>
</div>
<div class="sidenav">
    <img src="images/employmelogos.png" id="logo">
    <?php echo '<h3 style="text-align: center;"><big>Employer: '. $_SESSION["useremployer"] . '</big></h3>'; ?>
    <a style="text-decoration: none; font-size: 22px;" href="empdashboard.php"><span>DASHBOARD</span></a><br>
    <h3>JOBS</h3>
    <a style="text-decoration: none; font-size: 22px" href="emppostjobs.php"><span>POST JOBS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanagejobs.php">MANAGE JOBS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empapplications.php">APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageapplications.php">MANAGE APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empinterviews.php">MANAGE INTERVIEWS</a><br>
    <h3>MANAGE PROFILE</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageprofile.php"><span>PROFILE</span></a><br>
    <h3>SETTINGS</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empreports.php"><span>REPORTS</span></a><br>
    <a class="active"  style="text-decoration: none; font-size: 22px;" href="empchangepassword.php">CHANGE PASSWORD</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empaccountdetails.php">ACCOUNT DETAILS</a><br>
    <h3>EXIT</h3>
    <a style="text-decoration: none; font-size: 22px;" href="emplogout.php"><span>LOG OUT</span></a><br>
</div>
<div class="section">
        <form method="POST" action="empchangepassword.php" name="changepassword" id="changepassword" onsubmit="return validateForm()">
           <fieldset style="width:900px; background-color:floralwhite;">
            <legend><h2>Change Password</h2></legend>

            <h3>Current Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" type="password" id="old_password" name="old_password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showCurrentPassword()">Show Current Password

            <h3>New Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" type="password" id="password" name="password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showNewPassword()">Show New Password

            <h3>Confirm New Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" type="password" id="confirm_pwd" name="confirm_pwd" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showConfirmNewPassword()">Show Confirm New Password

            <div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?>" id="logerror"><?php echo @$error; ?><?php echo @$msg_sucess; ?></div><br><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 28px;" type="submit" id="change" name="change" value="CHANGE PASSWORD" onclick="validateForm()"><br><br>
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
</div><script>
    function showCurrentPassword() {
            var pass = document.getElementById("old_password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
        function showNewPassword() {
            var pass = document.getElementById("password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }

        function showConfirmNewPassword() {
            var cpass = document.getElementById("confirm_pwd");
            if (cpass.type === "password") {
                cpass.type = "text";
            } else {
                cpass.type = "password";
            }
        }
</script>
</body>
</html>