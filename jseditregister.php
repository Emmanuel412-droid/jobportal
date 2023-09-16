<?php
    // Start the session
session_start();
// Check if the jobseeker is logged in
if (!isset($_SESSION['userjobseeker'])) {
    // Redirect the jobseeker to the login page
    header('Location: jslogin.php');
    exit;
}
include("database.php");
if(ISSET($_POST['edit'])){
        $jsname = mysqli_real_escape_string($conn, $_POST['jsname']);
        $jsid=mysqli_real_escape_string($conn,$_POST['jsid']);
        $phonenumber= mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $county= mysqli_real_escape_string($conn, $_POST['county']);


    
    
        $sql = "UPDATE jsregister SET jsname = '$jsname',jsid='$jsid',phonenumber = '$phonenumber',email='$email',gender='$gender',county='$county' WHERE jsid='$jsid'";

        $result= mysqli_query($conn, $sql);
        if($result){
            $subject = "Account Details Edited";
            $message = "You have edited your account details successfully.Your new phonenumber will be $phonenumber, email will be $email, gender will be $gender and county will be $county.";
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $_SESSION['email'] = $email;
                echo("<script language='javascript'>window.alert('Details edited successfully!');window.location='jsaccountdetails.php';</script>");
                
            }else{
                echo("<script language='javascript'>window.alert('Edit unsuccessful!');window.location='jsaccountdetails.php';</script>");
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
    <title>Edit Account Details</title>
    <style>
.body{
    width: 1900px;
    height: auto;
    font: sans-serif;
    font-size: 20px;
}
.header{
    background-image: url('images/forest.jpg');
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
    font-size: 28px;
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
            let jsname = document.forms["register"]["jsname"].value;
            let jsid = document.forms["register"]["jsid"].value;
            let phonenumber = document.forms["register"]["phonenumber"].value;
            let email = document.forms["register"]["email"].value;
            let gender = document.forms["register"]["gender"].value;
            let county = document.forms["register"]["county"].value; 

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            let regJSID=/^[0-9a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            let dots = /\.([a-z\.]{2,6})/;

            if (jsname == ""  || jsid=="" || phonenumber=="" || email=="" || gender=="" || county=="" ) {
                alert("Form cannot be blank.Enter details");
                return false;
            }
            else if(!regFname.test(jsname)){
                alert("Name should have two words eg 'Zinc Shillete'.Starting letter of each word should be capital.No spaces at the end");
                document.getElementById('jsname').focus();
                return false;
            }
             else if(!regJSID.test(jsid)){
                alert("Jobseeker ID should be alphanumeric'");
                document.getElementById('jsid').focus();
                return false;
            }
            else if (jsid.length < 5){
                alert("Jobseeker ID should not be less than five");
                document.getElementById("jsid").focus();
                return false;
            }
            else if (jsid.length > 8){
                alert("Jobseeker ID should not be more than eight");
                document.getElementById("jsid").focus();
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
        }

    </script></head>
<body>
<div class="header">
    <h1>Edit Account Details</h1>
</div>
<div class="section">
<div class="sect">
    <form id="register" action="jseditregister.php" method="post" onsubmit="return validateForm()">
        <fieldset style="width:900px; background-color: floralwhite;">
            <legend><h1>Personal Details</h1></legend>

            <h2><label class="required">Jobseeker Name</label></h2>
            <p style="color:red;"><small>Jobseeker Name should be same as original one</small></p>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" width="40px" id="jsname" type="text" name="jsname" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Jobseeker ID</label></h2>
            <p style="color:red;"><small>Employer ID should be same as original one</small></p>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" width="40px" id="jsid" type="text" name="jsid" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Phone Number</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Email</label></h2>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="email" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h2><label class="required">Gender</label></h2>
            <input style="height:30px; width:60px;" id="gender" type="radio" name="gender" value="Male" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">MALE
            <input style="height:30px; width:60px;" id="gender" type="radio" name="gender" value="Female" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false">FEMALE

            <h2><label class="required">County</label></h2>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="county" id="county"  required="">
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
            </select><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 28px;" id="edit" type="submit"  name="edit" value="EDIT" onclick="validateForm()">

            
        </fieldset>
    </form><br><br><br><br>
</div>
</div>
</body>
</html>
