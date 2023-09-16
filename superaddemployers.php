<?php 

// Start the session
session_start();
// Check if the admin is logged in
if (!isset($_SESSION['useradmin'])) {
    // Redirect the admin to the login page
    header('Location: login.php');
    exit;
}
//include the connection
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
         $link="http://localhost/wizard/employme/empregverify.php";
        $result = mysqli_query($conn, $sql);
        if($result){
            $subject = "Email Verification Code";
            $message = 'Registration successfully.Your verification code is $regcode. Click <a href="' . $link . '">here</a> to continue with the progress.';
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo("<script language='javascript'>window.alert('Code sent to email.Registration successfully!');window.location='superemployers.php';</script>");
                // header('location: superemployers.php.php');
                exit();
            }else{
                echo("<script language='javascript'>window.alert('Failed while sending code!');window.location='superemployers.php';</script>");
            }
        }else{
            echo("<script language='javascript'>window.alert('Failed while inserting data into database!');window.location='superemployers.php';</script>");
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
    <title>Add Employer</title>
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
.section {
    height:auto;
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    padding-left: 480px;
    text-align: center;
    background-color: grey;
}
.required:after {
    content:" *";
    color: red;
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
            let ename = document.forms["addemployer"]["ename"].value;
            let empid = document.forms["addemployer"]["empid"].value;
            let phonenumber = document.forms["addemployer"]["phonenumber"].value;
            let email = document.forms["addemployer"]["email"].value;
            let county = document.forms["addemployer"]["county"].value;
            let password = document.forms["addemployer"]["password"].value;
            let conpassword = document.forms["addemployer"]["conpassword"].value;

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            let regEmpID=/^[0-9a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            var dots = /\.([a-z\.]{2,6})/;
            let regPassword=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

            if (ename == ""  || empid=="" || phonenumber=="" || email==""  || county=="" ||  password=="" || conpassword=="") {
                alert("Form cannot be blank.Enter details correctly.");
                return false;
            }
            else if(!regFname.test(ename)){
                alert("Name should have two strings eg 'Zinc Shillete'.No spaces at the end");
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
                alert("Email should have '@gmail'");
                document.getElementById('email').focus();
                return false;
            }
            else if(!dots.test(email)){
                alert("Email should have '.com'");
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
                document.getElementById('conpassword').focus();
                return false;
            }
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>Add Employer</h1>
</div>
<div class="section">
    <form method="post" action="superaddemployers.php" id="addemployer" name="addemployer" onsubmit="return validateForm()">
        <fieldset style="width:900px; background-color:floralwhite;">
            <legend><h4>Personal Details</h4></legend>

            <h5><label class="required">Employer Name</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="ename" type="text" name="ename" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" required="">

            <h5><label class="required">Employer ID</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="empid" type="text" name="empid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Phone Number</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" required="">

            <h5><label class="required">Email</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" required="">

            <h5><label class="required">County</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" name="county" id="county" required="">
                <option value="">Select county</option>
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

            <h5><label class="required">Password</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" id="password" type="password" name="password" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" required><br>
            <input style="width: 25px; height: 25px;" type="checkbox" onclick="showPassword()">Show Password

            <h5><label class="required">Confirm Password</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 28px;" width="40px" id="conpassword" type="password" name="conpassword" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" required><br>
            <input style="width: 25px; height: 25px;" type="checkbox" onclick="showConpassword()">Show Confirm Password

            <p>By continuing, you agree with our <a style="text-decoration: none;" href="termsofuse.php">Terms of Use</a> and <a style="text-decoration: none;" href="privacypolicy.php">Privacy Policy</a></p>

            <input style="height:50px; width:350px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 28px;" style="background-color:grey"  id="register" type="submit"  name="register" value="REGISTER EMPLOYER" onclick="validateForm()"><br><br>
        </fieldset>
    </form>
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