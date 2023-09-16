<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <style>
.body{
    width: 1900px;
    height: auto;
    font: sans-serif;
    font-size: 30px;
}
.active{
    background-color: green;
}
.header{
    background-color: blue;
    background-image: url('images/forests.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap: 5px;
    font-size: 20px;
    color: black;
}
.nav{
    width: 100%;
    height: auto;
    text-align: center;
    background-color: lightgrey;
    color: black;
    word-spacing: 3px;
}
.section{
    width: 100%;
    height: auto;
    text-align: center;
    background-color: floralwhite;
}
.sec{
    text-align: center;
    color: steelblue;
    background-color: floralwhite;
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
.footer {
    width: 100%;
    height: auto;
    text-decoration-color: darkblue;
    background-color: lightgrey;
    color: black;
    text-align: center;
    font-size: 25px
}
ul {
    text-decoration-color: black;
    color: white;
    padding: 30px;
    font-size: 25px
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
</head>
<body>
    <div class="header">
        <div class="headerimg">
            <img src="images/employmelogos.png" id="logo">
        </div>
        <div class="headertxt">
            <h1 style="text-align:center">EMPLOYME KRUB DESTINY</h1>
        </div>
    </div>
<div class="nav">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="aboutus.php">ABOUT US</a></li>
        <li><a href="contactus.php">CONTACT US</a></li>
        <li><a href="registration.php">SIGN UP</a></li>
        <li class="active"><a href="login.php">SIGN IN</a></li>
     </ul>
</div>
<div class="section">
    <div class="sec">
        <h1><big>Log in and get productive</big></h1>
    </div>
    <div class="sector">
        <div class="dissect">
            <fieldset style="height: 800px;">
                <legend style="color:brown;"><h2>For Employer</h2></legend><br><br><br><br><br><br><br><br><br><br>
                <img src="images/seeker.svg"><br><br>
                <h1>Employer</h1><br><br>
                <h2>Reach top talent and find the right candidate today</h2><br><br>
                <a href="emplogin.php"><button style="height:50px; width:300px; border: 1px hidden; background-color: lightgreen; color:blue; font-size: 26px;" class="sign up">SIGN IN</button></a>
            </fieldset>
        </div>
        <div class="dissect">
            <fieldset style="height: 800px;">
                <legend style="color:brown;"><h2>For Job Seeker</h2></legend><br><br><br><br><br><br><br><br><br><br>
                <img src="images/seeker.svg"><br><br>
                <h1>Job Seeker</h1><br><br>
                <h2>Your new career is one click away</h2><br><br>
                <a href="jslogin.php"><button style="height:50px; width:300px; border: 1px hidden; background-color: lightgreen; color: blue; font-size: 26px;" class="sign up">SIGN IN</button></a>
            </fieldset>
        </div>
</div>
</div>
<div class="footer">
<ul>
        <li><a href="privacypolicy.php">PRIVACY POLICY</a></li>
        <li><a href="termsandconditions.php">TERMS AND CONDITIONS</a></li>
</ul>
<p>EmployMe &copy; 2023. All Rights Reserved.</p>
</div>
</body>
</html>