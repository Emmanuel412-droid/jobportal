<?php

// Start the session
session_start();
// Check if the employer is logged in
if (!isset($_SESSION['useremployer'])) {
    // Redirect the employer to the login page
    header('Location: emplogin.php');
    exit;

}
?>


<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Employer Dashboard</title>
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
.active{
    background-color: black;
}
.active:hover{
    color:red;
}
.sidenav {
    height: 1080px;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 20px;
    left: 10px;
    margin-top: 50px;
    background-color: yellow;
    overflow-x: hidden;
    padding: 8px 0;
    padding-top: 20px;
    margin-top: 80px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 17px;
  color: blue;
  display: block;
}

.sidenav a:hover {
  background-color:black;
  color: blue;
}
.section {
    height:1100px;
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
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
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.favour{
display: flex;
}
/* Create three equal columns that sits next to each other */
.difav {
    flex: 33.33%;
    padding: 5px;
    color: black;
    text-align: center;
}

.footer {
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    height: auto;
    text-decoration-color: darkblue;
    background-color:lightgrey;
    color: black;
    text-align: center;
    font-size: 25px;
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
            .box-container9 {
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                flex-wrap: wrap;
                gap: 50px;
                margin-top: 250px;
            }  
            .box9 {
                height: 280px;
                width: 280px;
                border-radius: 20px;
                box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
                padding: 20px;
                display: flex;
                align-items: center;
                justify-content: space-around;
                cursor: pointer;
                transition: transform 0.3s ease-in-out;
                }
                .box9:hover {
                transform: scale(1.08);
                }

                .box9:nth-child(1) {
                background-color: black;
                }
                .box9:nth-child(2) {
                background-color: black;
                }
                .box9:nth-child(3) {
                background-color: black;
                }

                .box9 img {
                height: 50px;
                }
                .box9 .text {
                color: white;
                } 

         
    </style>
</head>
<body>
 <div class  ="header">
    <h1>Employer Dashboard</h1>
</div>
<div class="sidenav">
    <img src="images/employmelogos.png" id="logo">
    <?php echo '<h3 style="text-align: center;"><big>Employer: '. $_SESSION["useremployer"] . '</big></h3>'; ?>
    <a class="active" style="text-decoration: none; font-size: 22px;" href="empdashboard.php"><span>DASHBOARD</span></a><br>
    <h3>JOBS</h3>
    <a style="text-decoration: none; font-size: 22px" href="emppostjobs.php"><span>POST JOBS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanagejobs.php">MANAGE JOBS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empapplications.php">APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageapplications.php">MANAGE APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empinterviews.php">MANAGE INTERVIEWS</a><br>
    <h3>MANAGE PROFILE</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageprofile.php"><span>PROFILE</span></a><br>
    <h3>SETTINGS</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empreports.php"><span>REPORTS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empchangepassword.php">CHANGE PASSWORD</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empaccountdetails.php">ACCOUNT DETAILS</a><br>
    <h3>EXIT</h3>
    <a style="text-decoration: none; font-size: 22px;" href="emplogout.php"><span>LOG OUT</span></a><br>
</div>

<div class="section">
    <div style="background-color: floralwhite;" class="sector">
        <div class="dissect">
            <?php echo '<h3 style="color:black; margin-left: -250px; margin-top: -3px;">Welcome,'. $_SESSION["useremployer"] . '</h3>'; ?>
        </div>
        <div class="dissect">
            <img style="margin-right:-1150px; width:50px; height:50px;" src="images/source.png">
        </div>
        <div class="dissect">
            <?php echo '<h3 style="color:black; margin-right:-280px;  margin-top: 9px;">'. $_SESSION["useremployer"] . '</h3>'; ?>
            <span style="color:black; margin-right:-230px; " id="txt"></span>  
            <span style="color:black; margin-right:-150px; " id="txt2"></span> 
        </div>
</div>
<div class="box-container9">

                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; text-align: center;">JOBS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 65px;" src="images/jobs.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 45px; background-color:white;"><a style="text-decoration:none; color: black;" href="emppostjobs.php"><h2>POST</h2></a></button>
                    </div>
                </div>
                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; text-align: center;">JOBS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 65px;" src="images/jobs.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 45px; background-color:white;"><a style="text-decoration:none; color: black;" href="empmanagejobs.php"><h2>MANAGE</h2></a></button>
                    </div>
                </div>
                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; text-align: center;">JOBS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 65px;" src="images/jobs.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 45px; background-color:white;"><a style="text-decoration:none; color: black;" href="empmanagejobs.php"><h2>STATUS</h2></a></button>
                        
  
                    </div>
                </div>
            </div>
</div>
<div class="footer">
    <div class="favour">
        <div class="difav">
        <a style="color:black; text-decoration:none; padding-top:20px" href="empmanageapplications.php"><h2>Manage Applications</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empinterviews.php"><h2>Manage Interviews</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empapplications.php"><h2>Job Applications</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empmanagejobs.php"><h2>Manage Jobs</h2></a>
        </div>
        <div class="difav">
        <a style="color:black; text-decoration:none; padding-top:20px" href="empchangepassword.php"><h2>Change Password</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="emppostjobs.php"><h2>Post Jobs</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empmanageprofile.php"><h2>Profile</h2></a>
        <a style="color:black; text-decoration:none; padding-top:20px" href="empreports.php"><h2>Reports</h2></a>
        </div>
    </div>
<p style="color:black;"><h3>EmployMe &copy; 2023 || All Rights Reserved.</h3></p>
</div>
 <script>
    var date = new Date();
    var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
    var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
    var date = current_date;  
    document.getElementById("txt").innerHTML = date;
</script>
<script>  
window.onload=function(){getTime();}  
function getTime(){  
var today=new Date(); 
var day = today.getDay();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate(); 
var h=today.getHours();  
var m=today.getMinutes(); 
var s=today.getSeconds();  
// add a zero in front of numbers<10  
m=checkTime(m);  
s=checkTime(s);  
document.getElementById('txt2').innerHTML=h+":"+m+":"+s;  
setTimeout(function(){getTime()},1000);  
}  
//setInterval("getTime()",1000);//another way  
function checkTime(i){  
if (i<10){  
  i="0" + i;  
 }  
return i;  
}  
</script>
</body>
</html>