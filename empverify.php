<?php
//start session
session_start();
//set connection
include("database.php");
 //if user click verification code submit button
    if(isset($_POST['verify'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM empregister WHERE password = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['password'];
            $email = $fetch_data['email'];
            $password= 0;
            $update_otp = "UPDATE empregister SET password = $password WHERE password = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){
                $_SESSION['email'] = $email;
                echo("<script language='javascript'>window.alert('Verified!');window.location='empresetpassword.php';</script>");
                //header('location: empresetpassword.php');
                exit();
            }else{
                echo "Failed while updating code!";
            }
        }else{
            echo "You've entered incorrect code!";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <style type="text/css">
        .section{
    width: 800px;
    height: 500px;
    margin-left: 600px;
    margin-top: 200px;
    text-align: center;
    background-color: grey;
}
    </style>
</head>
<body>
    <div class="section">
                <form action="empverify.php" method="POST">
                    <h2>Code Verification</h2>
                    <h3>We've sent a verification code to your email</h3>
                        <input style="width: 600px; height: 50px; margin-top: 90px; border: 3px solid black; font-size: 25px;" type="number" name="otp" placeholder="Enter verification code" required><br><br>
                
                        <input style="width: 150px; height: 60px; border: 3px solid black; font-size: 25px;" type="submit" name="verify" id="verify" value="SUBMIT">
                   
                </form>
    </div>
    
</body>
</html>