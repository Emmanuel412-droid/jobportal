<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>About Us</title>
    <style>
.body{
    width: 1900px;
    height: auto;
    font: sans-serif;
    font-size: 30px;
    background-color: floralwhite;
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
.active{
    background-color: green;
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
    color: black;
    background-color: floralwhite;
    font-size: 25px;
}
.sec{
    text-align: center;
    color: black;
    font-size: 25px;
}
.sect{
    height: auto;
    width: 100%;
    text-align: center;
    color: black;
    font-size: 25px;
}
.imgtxt {
    padding-left: 100px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap: 5px;
}
.image {
    font-size: 25px;
    color: black;
}
.text {
    font-size: 25px;
    color: black;
}
.vismiscore{
    padding-left: 200px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap: 5px;
}
.vision{
    font-size: 25px;
    color: black;
}
.mission {
    font-size: 25px;
    color: black;
}
.core{
    font-size: 25px;
    color: black;
}
.footer {
    width: 100%;
    height: auto;
    text-decoration-color: darkblue;
    background-color: lightgrey;
    color: black;
    text-align: center;
    font-size: 25px;
}
ul {
    text-decoration-color: black;
    color: white;
    padding: 20px;
    font-size: 25px;
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
        <li class="active"><a href="aboutus.php">ABOUT US</a></li>
        <li><a href="contactus.php">CONTACT US</a></li>
        <li><a href="registration.php">SIGN UP</a></li>
        <li><a href="login.php">SIGN IN</a></li>
    </ul>
</div>
<div class="section">
    <div class="sec">
        <img src="images/team.jpg">
        <p><big>EmployMe is changing the way people think about hiring.<br>
        By efficiently connecting employers and potential hires through our mobile platform, <br>we make finding that perfect person
        a fun experience,<br>allowing businesses to grow and job seekers to access new opportunities.</big></p>
    </div>
    <div class="imgtxt">
        <div class="image">
            <img src="images/people.png">
            <h3 style="color:brown">Our Clients</h3>
            <p><big>At EmployMe, our aim is to help people get jobs. We have more global employees passionately pursuing this purpose and improving the recruitment journey through real stories and data. We foster a collaborative workplace that strives to create the best experience for job seekers.</big></p>
        </div>
        <div class="text">
            <p><big>EmployMe was developed because in this digital day and age,<br>
            finding the perfect hire or job opening should not be a nightmare.</big></p>
            <p><big>From our founding in 2020 to where we have reached today,<br>
            EmployMe is moving recruiting from being a manual labor process to a modern,<br>
            automated matching solution.</big></p>
        </div>
    </div>
    <div class="vismiscore">
        <div class="vision">
            <h3 style="color:brown">Vision</h3>
            <p><big>To create local opportunity, growth and impact in every community and regions around the country.</big></hp>
        </div>
        <div class="mission">
            <h3 style="color:brown">Mission</h3>
            <p><big>To empower every person and every organization in the country to achieve more.</big></p>
        </div>
        <div class="core">
            <h3 style="color:brown">Core Values</h3>
            <ul>
                <p><big><li>Discipline</li></big></p>
                <p><big><li>Integrity</li></big></p>
                <p><big><li>Team Work</li></big></p>
                <p><big><li>Hardwork</li></big></p>
                <p><big><li>Commitment</li></big></p>
            </ul>
        </div>
    </div>
</div>
<div class="footer">
    <ul>
        <li><a href="privacypolicy.php">PRIVACY POLICY</a></li>
        <li><a href="termsandconditions.php">TERMS AND CONDITIONS</a></li>
    <p>EmployMe &copy; 2023. All Rights Reserved.</p>
</div>
</body>
</html>