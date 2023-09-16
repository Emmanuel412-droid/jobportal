<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Home</title>
    <style>
        .body{
            width: 1900px;
            height: auto;
            font: sans-serif;
            font-size: 30px;
            background-color: floralwhite;
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
            text-align: center;
            background-color: floralwhite;
            font-size: 25px;
        }
        .sec{
            height: 50px;
            text-align: center;
            font-size: 25px;
        }
        .img{
            display: flex;
            font-size: 25px;
        }
        .image{
            flex: 20%;
            padding: 5px;
        }
        .txt{
            padding-left: 500px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            column-gap: 5px;
            font-size: 25px;
        }
        .text{
            font-size: 25px;
            color: black;

        }
        .disector {
            display: flex;
            font-size: 25px;
        }
        /* Create three equal columns that sits next to each other */
        .disect {
            flex: 33.33%;
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
            padding: 20px;
            font-size: 25px;
        }
        ul li {
            display:inline;
            padding:20px;
            text-decoration:black;
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
	 	<li class="active"><a href="index.php">HOME</a></li>
        <li><a href="aboutus.php">ABOUT US</a></li>
	 	<li><a href="contactus.php">CONTACT US</a></li>
        <li><a href="registration.php">SIGN UP</a></li>
        <li><a href="login.php">SIGN IN</a></li>
	 </ul>
</div>
<div class="section">
    <div class="sec">
        <h1 style="word-spacing: 80px; padding-top: -20px; color: blue;">CREATE     EXPLORE     INNOVATIVE</h1>
    </div>
    <div class="sect">
        <img src="images/job.png">
    </div>
    <div class="img">
        <div class="image">
            <img src="images/boostcareer2.jpg">
        </div>
        <div class="image">
            <img src="images/jobs.jpg">
        </div>
        <div class="image">
            <img src="images/jobvacancy.jpg">
        </div>
    </div>
    <div class="txt">
    <div class="text">
        <h2>For Employers</h2>
        <p>Find the right talent with ease</p>
        <p>Make your hiring process quick<br>and hassle-free using our recruitment<br>solutions which are tailored for every hiring need.</p>
    </div>
    <div class="text">
        <h2>For Seekers</h2>
        <p>Connect to opportunities</p>
        <p>Explore and exploit<br>the opportunities available.<br>Grab the chance by registering now!</p>
    </div>
  </div>
    <div class="disector">
            <div class="disect">
                <img src="images/source.png">
                <h3><strong>Source!</strong></h3>
                <p><big>Tell us about yourself and your<br>ideal hire.We will quickly match<br>you with a great group of potential colleagues.</big></p>
            </div>
            <div class="disect">
                <img src="images/tests.png">
                <h3><strong>Screen!</strong></h3>
                <p><big>We build customized screening tests<br>to assess soft and technical skills.<br>You can view results and our insights.</big></p>
            </div>
            <div class="disect">
                <img src="images/work-success.png">
                <h3><strong>Hire!</strong></h3>
                <p><big>Choose your favorite person from<br>our solid roster of qualified,recommended<br>candidates and enjoy the growth that follows.</big></p>
            </div>
        </div>
        <div class="disector">
        <div class="disect">
            <img src="images/source.png">
            <h3><strong>Source!</strong></h3>
            <p><big>Tell us about yourself</big></p>
        </div>
        <div class="disect">
            <img src="images/tests.png">
            <h3><strong>Tests!</strong></h3>
            <p><big>Pass interview tests</big></p>
        </div>
        <div class="disect">
            <img src="images/work-success.png">
            <h3><strong>Hired!</strong></h3>
            <p><big>Hurray! You got hired!</big></p>
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