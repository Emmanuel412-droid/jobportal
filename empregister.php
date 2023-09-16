<?php
//start session
session_start();
//include connection
include("database.php");
    if(ISSET($_POST['register'])){
        $ename = mysqli_real_escape_string($conn, $_POST['ename']);
        $empid=mysqli_real_escape_string($conn,$_POST['empid']);
        $phonenumber= mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $county= mysqli_real_escape_string($conn, $_POST['county']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $sq = "SELECT * FROM empregister WHERE ename='$ename'";
        $re = mysqli_query($conn, $sq);

        if (mysqli_num_rows($re) > 0) {

            echo "Sorry... Employer Name already taken";  
      }

      $sql = "SELECT * FROM empregister WHERE empid='$empid'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

            echo "Sorry... Employer ID already taken";  
      }
      $link = "SELECT * FROM empregister WHERE phonenumber='$phonenumber'";
        $rew = mysqli_query($conn, $link);

        if (mysqli_num_rows($rew) > 0) {

            echo "Sorry... Phone Number already taken";  
      }
      $stmt = "SELECT * FROM empregister WHERE email='$email'";
        $sew = mysqli_query($conn, $stmt);

        if (mysqli_num_rows($sew) > 0) {

            echo "Sorry... Email already taken";  
      }
    else{
        $regcode = rand(999999, 111111);
        $sql="INSERT INTO empregister(ename,empid,phonenumber,email,county,password,regcode) VALUES('$ename','$empid','$phonenumber','$email','$county',md5('$password'),'$regcode')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $subject = "Email Verification Code";
            $message = "Registration successfully.Your verification code is $regcode";
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo("<script language='javascript'>window.alert('Code sent to email.Registration successfully!');window.location='empregverify.php';</script>");
                // header('location: empregverify.php');
                exit();
            }else{
                echo "Failed while sending code!";
            }
        }else{
            echo "Failed while inserting data into database!";
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
    <title>Employer Sign Up</title>
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
    height: auto;
    text-align: center;
    background-color: grey;
    font-size: 20px;
}
.sect{
    padding-left: 500px;
    text-align: center;
    color: black;
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
    color: darkblue;
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
            color: darkblue;
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
            let ename = document.forms["register"]["ename"].value;
            let empid = document.forms["register"]["empid"].value;
            let phonenumber = document.forms["register"]["phonenumber"].value;
            let email = document.forms["register"]["email"].value;
            let county = document.forms["register"]["county"].value;
            let password = document.forms["register"]["password"].value;
            let conpassword = document.forms["register"]["conpassword"].value;  

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            let regEmpID=/^[0-9a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            let dots = /\.([a-z\.]{2,6})/;
            let regPassword=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

            if (ename == ""  || empid=="" || phonenumber=="" || email=="" || county=="" || password=="" || conpassword=="") {
                alert("Form cannot be blank.Enter details");
                return false;
            }
            else if(!regFname.test(ename)){
                alert("Name should have two words eg 'Zinc Shillete'.Starting letter of each word should be capital.No spaces at the end");
                document.getElementById('ename').focus();
                return false;
            }
             else if(!regEmpID.test(empid)){
                alert("Employer ID should be alphanumeric'");
                document.getElementById('empid').focus();
                return false;
            }
            else if (empid.length < 5){
                alert("Employer ID should not be less than five");
                document.getElementById("empid").focus();
                return false;
            }
            else if (empid.length > 8){
                alert("Employer ID should not be more than eight");
                document.getElementById("empid").focus();
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
                alert("Email should @gmail");
                document.getElementById('email').focus();
                return false;
            }
            else if(!dots.test(email)){
                alert("Email should .com");
                document.getElementById('email').focus();
                return false;
            }
            else if(!regPassword.test(password)){
                alert("Enter valid password.Password should have at least one lowercase letter, one uppercase letter, one numeric digit, and one special character and be of 8 to 20 characters");
                document.getElementById('password').focus();
                return false;
            }
            else if(password != conpassword) {
                alert("Password and confirm password do not match");
                return false;
            }
        }

    </script></head>
<body>
<div class="header">
    <h1>EMPLOYER SIGN UP</h1>
</div>
<div class="section">
<div class="sect">
    <form id="register" action="empregister.php" method="post" onsubmit="return validateForm()">
        <fieldset style="width:900px; background-color: floralwhite;">
            <legend><h1>Personal Details</h1></legend>

            <h2><label class="required">Employer Name</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="ename" type="text" name="ename" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Employer ID</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="empid" type="text" name="empid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Phone Number</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Email</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">County</label></h2>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" name="county" id="county"  required="">
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

            <h2><label class="required">Password</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="password" type="password" name="password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showPassword()"><big>Show Password</big>

            <h2><label class="required">Confirm Password</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="conpassword" type="password" name="conpassword" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required><br>
            <input style="width:25px; height:25px;" type="checkbox" onclick="showConpassword()"><big>Show Confirm Password</big>

            <p><big>By continuing, you agree with our <a style="text-decoration: none; color:darkblue;" href="termsandconditions.php">Terms and Conditions</a> and <a style="text-decoration: none; color:darkblue;" href="privacypolicy.php">Privacy Policy</a></big></p>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 28px;" id="register" type="submit"  name="register" value="REGISTER" onclick="validateForm()"><br><br>
            
        </fieldset>
    </form><br><br>
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

        function showConpassword() {
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
