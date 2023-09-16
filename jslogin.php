<?php

//when you start work on login. Firstly start session.
  session_start();

  //include connection file here
  include('database.php');

  if(isset($_POST['login'])) 
  {

      $jsname = mysqli_real_escape_string($conn, $_POST['jsname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

      //check query for user and password exist in user table or not
      $sql = "SELECT * FROM jsregister WHERE jsname = '" . $jsname. "' and email = '" . $email. "' and password = '" . md5($password). "'";

      $row = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($row);

      if($count > 0)
      {

          //Here I am fetching user detail
          $rows = mysqli_fetch_object($row);

          // Here I am checking user login enable or disable.. if user status is 1. So it will redirect to welcome page otherwise show error message.
          if($rows->status == '5')
          {
              $_SESSION['userjobseeker']=$_POST['jsname'];
              //$_SESSION['login_id'] = $rows->id;
              $_SESSION['jsname'] = $rows->jsname;
              $_SESSION['email'] = $rows->email;
              $_SESSION['password'] = $rows->password;
              echo("<script language='javascript'>window.alert('Account approved.Login successful!');window.location='jsdashboard.php';</script>");
              
          }
          if($rows->status =='10')
          {   
              $_SESSION['userjobseeker']=$_POST['jsname'];
              //$_SESSION['login_id'] = $rows->id;
              $_SESSION['jsname'] = $rows->jsname;
              $_SESSION['email'] = $rows->email;
              $_SESSION['password'] = $rows->password;
              echo("<script language='javascript'>window.alert('Account rejected!');window.location='jslogin.php';</script>");
              
              
          }
          if($rows->status == '0')
          {   
              $_SESSION['userjobseeker']=$_POST['jsname'];
              //$_SESSION['login_id'] = $rows->id;
              $_SESSION['jsname'] = $rows->jsname;
              $_SESSION['email'] = $rows->email;
              $_SESSION['password'] = $rows->password;
              echo("<script language='javascript'>window.alert('Account Pending!');window.location='jslogin.php';</script>");
          }
          }
      
      else 
      {   
          echo("<script language='javascript'>window.alert('Invalid name,email or password!');window.location='jslogin.php';</script>");
      }
      
   }

?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Jobseeker Sign In</title>
    <style>
.body{
    width: 1900px;
    height: auto;
    font: sans-serif;
    font-size: 20px;
}
.header{
    background-image: url('images/forests.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap: 5px;
    font-size: 20px;
    color: black;
    width: 100%;
    height: auto;
    padding-left: 650px;
    text-align: center;
} 
.section{
    width: 100%;
    height: 1150px;
    background-color: grey;
    color: black;
    font-size: 20px;
}
.required:after {
    content:" *";
    color: red;
  }
.sect{
    padding-left: 550px;
    text-align: center;
    color: black;
}
.footer {
    width: 100%;
    height: auto;
    background-color: lightgrey;
    color: black;
    text-align: center;
}
ul {
    text-decoration-color: black;
    color: white;
    padding: 20px;
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
            let jsname = document.forms["login"]["jsname"].value;
            let email = document.forms["login"]["email"].value;
            let password = document.forms["login"]["password"].value;

            if (jsname=="" || email=="" || password=="" ) {
                alert("Form cannot be blank.Enter details.Details must match the ones you registered the account.");
                return false;
            }
        }
    </script>
</head>
<body>
<div class="header">
    <h1>Jobseeker Sign In</h1>
</div>
<div class="section">
    <div class="sect">
        <form method="POST" action="jslogin.php"  name="login" id="login">

            <fieldset style="width:900px; height:1000px; background-color: floralwhite;">
                <legend><h1>Log In Here</h1></legend><br><br><br>

                <h2><label class="required">Jobseeker Name</label></h2>
                <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="jsname" type="text" name="jsname" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

                <h2><label class="required">Email</label></h2>
                <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required>

                <h2><label class="required">Password</label></h2>
                <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="password" type="password" name="password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required><br>
                <input style="width:25px; height:25px;" type="checkbox" onclick="showPassword()"><big>Show Password</big><br><br><br>

                <input style="height:50px; width:200px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 28px;" id="login" type="submit" name="login" value="LOGIN" onclick="validateForm()"><br><br><br><br>


                <a style="text-decoration:none; color: darkblue;" href="jsforgotpassword.php"><h2>Forgot Password</h2></a><br><br>

                <h2>New to EmployMe? <a style="text-decoration: none; color:darkblue;" href="jsregister.php"> Register</a></h2>

            </fieldset>
        </form><br><br><br><br>
    </div>
</div>
<script>
        function showPassword() {
            var pass = document.getElementById("password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
        </script>
</body>
</html>