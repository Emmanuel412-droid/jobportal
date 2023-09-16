 <?php
  session_start();
  include('database.php');

 //if user click continue button in forgot password form
    if(isset($_POST['forgotpassword'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM empregister WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE empregister SET password = $code WHERE email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: cheruiyotemmanuel24@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    echo("<script language='javascript'>window.alert('Otp send via email!');window.location='empverify.php';</script>");
                    //header('location: empverify.php');
                    exit();
                }else{
                    echo "Failed while sending code!";
                }
            }else{
                echo "Something went wrong!";
            }
        }else{
            echo "This email address does not exist!";
        }
    }
?>
  

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Forgot Password</title>
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
    background-color: lightgreen;
}
.active:hover{
    color:red;
}
.nav{
    width: 100%;
    height: auto;
    background-color: lightgrey;
    text-align: center;
    color: steelblue;
}
.section{
    width: 100%;
    height: auto;
    background-color:grey;
    color: black;
    padding-left: 600px;
    text-align: center;
    color: black;
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
</head>
<body>
 <div class  ="header">
    <h1>Forgot Password</h1>
</div>
<div class="section">
        <!-- Forgot password form -->
        <form action="empforgotpassword.php" method="POST">
          <fieldset style="width:500px; height:300px; background-color: floralwhite;">
            <legend><h2>Change Password</h2></legend>
            <h3>Email</h3>
            <input style="height:50px; width:600px; border: 3px solid black; background-color: lightgrey; color: black; font-size: 26px;" type="email" id="email" name="email" required=""><br><br>

            <button style="height:50px; width:300px; border: 1px hidden; background-color: lightgreen; color: blue; font-size: 26px;" type="submit" id="forgotpassword" name="forgotpassword" name="change" value="Password Reset">Forgot Password</button>
          </fieldset>
        </form><br><br><br><br>
  </div>
</body>
</html>




    
 

