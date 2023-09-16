<?php
// Start the session
session_start();
// Check if jobseeker is logged in
if (!isset($_SESSION['userjobseeker'])) {
    // Redirect the jobseeker to the login page
    header('Location: jslogin.php');
    exit;
}

include("database.php");
if(ISSET($_POST['edit'])){
        $jsname = mysqli_real_escape_string($conn, $_POST['jsname']);
        $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $county = mysqli_real_escape_string($conn, $_POST['county']);
        $town = mysqli_real_escape_string($conn, $_POST['town']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $id_passport= mysqli_real_escape_string($conn, $_POST['id_passport']);
        $postal = mysqli_real_escape_string($conn, $_POST['postal']);
        $zip = mysqli_real_escape_string($conn, $_POST['zip']);


    
    
        $sql = "UPDATE jsprofile SET jsname = '$jsname', phonenumber = '$phonenumber', email = '$email',gender='$gender',county='$county',town='$town',dob='$dob',id_passport='$id_passport',postal='$postal',zip='$zip' WHERE jsname = '$jsname'";

        $result= mysqli_query($conn, $sql);
        if($result){
            $subject = "Profile Edited";
            $message = "You have edited your profile successfully.";
            $sender = "From: cheruiyotemmanuel24@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $_SESSION['email'] = $email;
                echo("<script language='javascript'>window.alert('Profile edited successfully');window.location='jsmanageprofile.php';</script>");
                
            }else{
                echo("<script language='javascript'>window.alert('Failed to edit');window.location='jsmanageprofile.php';</script>");
            }
        }else{
            echo("<script language='javascript'>window.alert('Failed while inserting data into database!');window.location='jsmanageprofile.php';</script>");
        }
    }

?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Profile</title>
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
    background-color: black;
}
.active:hover{
    color:red;
}
.section {
    height:1900px; 
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
    padding-left: 550px;
    background-color: grey;
}
.required:after {
    content:" *";
    color: red;
  }
.sector {
  display: flex;
}
/* Create  equal columns that sits next to each other */
.dissect {
  flex: 50%;
  padding: 5px;
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
    <script type="text/javascript">
        function validateForm() {
            let jsname = document.forms["profile"]["jsname"].value;
            let phonenumber = document.forms["profile"]["phonenumber"].value;
            let email = document.forms["profile"]["email"].value;
            let gender = document.forms["profile"]["gender"].value;
            let county = document.forms["profile"]["county"].value;
            let town = document.forms["profile"]["town"].value;
            let dob = document.forms["profile"]["dob"].value;
            let id_passport = document.forms["profile"]["id_passport"].value;
            let postal = document.forms["profile"]["postal"].value;
            let zip = document.forms["profile"]["zip"].value;
             

            let regFname=/^[a-zA-Z]+ [a-zA-Z]+$/;
            let symbols = /@([\da-z\.-]+)/;
            let dots = /\.([a-z\.]{2,6})/;

            if (jsname == ""  || phonenumber=="" || email=="" || gender=="" || county=="" || town=="" || dob=="" || id_passport=="" || postal=="" || zip=="") {
                alert("Form cannot be blank.Enter details.");
                return false;
            }
            else if(!regFname.test(jsname)){
                alert("Name should have two strings eg 'Panther Junior'");
                document.getElementById('jsname').focus();
                return false;
            }
            else if(isNaN(phonenumber)){
                alert("Phone number should be of numeric value only.Digits only");
                document.getElementById("phonenumber").focus();
                return false;
            }
            else if (phonenumber.length < 10){
                alert("Phone number must have ten digits");
                return false;
            }
            else if (phonenumber.length > 10){
                alert("Phone number must have ten digits");
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
            else if(isNaN(id_passport)){
                alert("ID/Passport should be of numeric value.Digits only");
                document.getElementById("id_passport").focus();
                return false;
            }
            else if (id_passport.length < 6){
                alert("ID/Passport must not be less than six");
                document.getElementById("id_passport").focus();
                return false;
            }
            else if (id_passport.length > 9){
                alert("ID/Passport must not be more than nine");
                document.getElementById("id_passport").focus();
                return false;
            }
            else if(isNaN(postal)){
                alert("Postal address should be of numeric value.Digits only");
                document.getElementById("postal").focus();
                return false;
            }
            else if (postal.length < 2){
                alert("Postal address must not be less than two");
                document.getElementById("postal").focus();
                return false;
            }
            else if (postal.length > 5){
                alert("Phone address must not be more than five");
                document.getElementById("postal").focus();
                return false;
            }
            else if(isNaN(zip)){
                alert("Zip code should be of numeric value.Digits only");
                document.getElementById("zip").focus();
                return false;
            }
            else if (zip.length < 5){
                alert("Zip code number must not be less than five");
                document.getElementById("zip").focus();
                return false;
            }
            else if (zip.length > 5){
                alert("Zip code must not be more than five");
                document.getElementById("zip").focus();
                return false;
            }
        }
    </script>
</head>
<body>
 <div class  ="header">
    <h1>EDIT PROFILE</h1>
</div>
<div class="section">
    <form method="POST" action="jseditprofile.php" id="profile" name="profile" onsubmit="return validateForm()"> 

    
        <fieldset style="width:800px; height: 1800px; background-color:floralwhite;">
            <legend><h4>Personal Details</h4></legend>

            <h5><label class="required">JobSeeker Name</label></h5>
            <p style="color:red;"><small>Jobseeker Name should be same as original one</small></p>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="jsname" type="text" name="jsname" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Phone Number</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="phonenumber" type="tel" name="phonenumber" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Email</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="email" type="text" name="email" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">

            <h5><label class="required">Gender</label></h5>
            <input style="height:30px; width:60px;" id="gender" type="radio" value="Male" name="gender" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">MALE
            <input style="height:30px; width:60px;" id="gender" type="radio" value="Female" name="gender" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" >FEMALE

            <h5><label class="required">County</label></h5>
            <select style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" name="county" id="county" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required="">
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

            <h5><label class="required">Town</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="town" type="text" name="town" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required>

            <h5><label class="required">Date of Birth</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" type="date" id="dob" name="dob" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false">

            <h5><label class="required">ID/Passport</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="id_passport" type="number" name="id_passport" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required>

            <h5><label class="required">Postal Address</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="postal" type="number" name="postal" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required>

            <h5><label class="required">Zip Code</label></h5>
            <input style="height:50px; width:600px; border: 1px hidden; background-color: lightgrey; color: black; font-size: 26px;" id="zip" type="number" name="zip" onselectstart="return false" oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" required><br><br>

            <input style="height:50px; width:300px; border: 1px hidden; background-color: black; color: floralwhite; font-size: 26px;" id="edit" type="submit"  name="edit" value="EDIT PROFILE" onclick="validateForm()"><br><br>
        </fieldset>
        </form>
</div>
</body>
</html>