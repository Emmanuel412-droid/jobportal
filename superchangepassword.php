<?php
// Start the session
session_start();
// Check if the admin is logged in
if (!isset($_SESSION['useradmin'])) {
    // Redirect the admin to the login page
    header('Location: login.php');
    exit;

}
 include "database.php";

  if(isset($_POST['change'])):
  extract($_POST);
  if($old_password!="" && $password!="" && $confirm_pwd!="") :
    $session=$_SESSION["useradmin"];
  $old_pwd=md5(mysqli_real_escape_string($conn,$_POST['old_password']));
  $pwd=md5(mysqli_real_escape_string($conn,$_POST['password']));
  $c_pwd=md5(mysqli_real_escape_string($conn,$_POST['confirm_pwd']));
  if($pwd == $c_pwd) :
  if($pwd!=$old_pwd) :
    $sql="SELECT * FROM `superadmin` WHERE  `password` ='$old_pwd' and aname='$session'";
    $db_check=$conn->query($sql);
    $count=mysqli_num_rows($db_check);
  if($count==1) :
    $fetch=$conn->query("UPDATE `superadmin` SET `password` = '$pwd' where aname='$session'");
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
    $error = "Please fill all the fields";
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
  background-color: orange;
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
      .favour {
  display: flex;
}
/* Create  equal columns that sits next to each other */
.difav{
    flex: 33.33%;
    padding: 5px;
    color: black;
    text-align: center;
}
.section {
    height:1100px;
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    padding-left: 350px;
    text-align: center;
    background-color: grey;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.footer {
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    height: auto;
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
        font-size: 25px;

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
    <h1>CHANGE PASSWORD</h1>
</div>
<div class="sidenav">
        <img src="images/employmelogos.png" id="logo"><br><br>
        <?php echo '<h3 style="text-align: center;"><big>Admin: '. $_SESSION["useradmin"] . '</big></h3>'; ?>
        <a style="text-decoration: none; font-size: 22px;" href="superdashboard.php"><span>DASHBOARD</span></a><br>
        <h3>JOBS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superviewjobs.php"><span>VIEW JOBS</span></a><br>
        <a style="text-decoration: none; font-size: 22px;" href="supermanagejobs.php"><span>MANAGE JOBS</span></a><br>
        <h3>USERS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superemployers.php"><span>EMPLOYERS</span></a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superjobseekers.php"><span>JOBSEEKERS</span></a><br>
        <h3>MANAGE PROFILE</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superprofile.php"><span>PROFILE</span></a><br>
        <h3>SETTINGS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superreports.php">REPORTS</a><br>
        <a class="active" style="text-decoration: none; font-size: 22px;" href="superchangepassword.php">CHANGE PASSWORD</a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superaccountdetails.php">ACCOUNT DETAILS</a><br>
        <h3>EXIT</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superlogout.php"><span>LOG OUT</span></a><br>
</div>

<div class="section">
    <form method="POST" action="superchangepassword.php" id="changepassword" onsubmit="return validatePassword()">
          <fieldset style="width:900px; background-color:floralwhite;">
            <legend><h2>Change Password</h2></legend>

            <h3>Current Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" type="password" id="old_password" name="old_password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showCurrentPassword()">Show Current Password

            <h3>New Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" type="password" id="password" name="password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showNewPassword()">Show New Password

            <h3>Confirm New Password</h3>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" type="password" id="confirm_pwd" name="confirm_pwd" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required=""><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showConfirmNewPassword()">Show Confirm New Password

            <div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?>" id="logerror"><?php echo @$error; ?><?php echo @$msg_sucess; ?></div><br><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 26px;" type="submit" id="change" name="change" value="CHANGE PASSWORD" onclick="validateForm()"><br><br>
          </fieldset>
        </form>
</div>
<div class="footer">
    
        <div class="favour"> 
            <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="supermanagejobs.php"><h2>Manage Jobs</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superviewjobs.php"><h2>View Jobs</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superadmin.php"><h2>Admin</h2></a>
      </div>
      <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="superjobseekers.php"><h2>Job Seekers</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superemployers.php"><h2>Employers</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superprofile.php"><h2>Profile</h2></a>
      </div>
      <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="superchangepassword.php"><h2>Change Password</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superreports.php"><h2>Reports</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="logout.php"><h2>Log Out</h2></a>
      </div>
  </div>
        <p style="color:black;"><big>EmployMe &copy; 2023 || All Rights Reserved.</big></p>
</div>
<script>
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