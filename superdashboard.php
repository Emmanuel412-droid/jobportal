<?php 

// Start the session
session_start();
// Check if the admin is logged in
if (!isset($_SESSION['useradmin'])) {
    // Redirect the admin to the login page
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
    <style>
        .body{
            width: 1900px;
            height: auto;
            margin: 0;
            font-family: "Lato", sans-serif;
            font-size: 20px;
            overflow-x: hidden;
        }
        .header{
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
            background-color: orange;
            overflow-x: hidden;
            padding: 8px 0;
            padding-top: 20px;
            margin-top: 80px;
        }
        .sidenav a{
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 17px;
            color: blue;
            display: block;
        }
        .sidenav a:hover{
            background-color:black;
            color: blue;
        }
        .section{
            height:1300px;
            margin-left: 260px; /* Same width as the sidebar + left position in px */
            font-size: 30px; /* Increased text to enable scrolling */
            padding: 0px 10px;
            background-color: floralwhite;
        }
        .container2 {
  display: flex;
  align-items: center;
  justify-content: center
}
.image2 {
  flex-basis: 15%
}

.text2 {
  font-size: 25px;
}
        .sector {
  display: flex;
}
/* Create  equal columns that sits next to each other */
.dissect {
  flex: 33.33%;
  padding: 5px;
  color: black;
  text-align: center;
}
 .favour{
  display: flex;
}
/* Create  equal columns that sits next to each other */
.difav {
  flex: 25%;
  padding: 5px;
  color: black;
  text-align: center;
}
.difactor {
            display: flex;
        }
        /* Create three equal columns that sits next to each other */
        .difact {
            flex: 33.33%;
            padding: 5px;
            color: black;
            text-align: center;
        }
        form {
        width: 1000px;
        margin: auto;
      }
      input {
        height: 50px;
        padding: 4px 10px;
        border: 0;
        font-size: 16px;
      }
      .search {
        width: 75%;
      }
      .submit {
        width: 100px;
        background-color: green;
        color: yellow;
      }
        @media screen and (max-height: 450px){
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .image{
            color: black;
        }
        .text{
            padding-left:20px;
            color: black;
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
        ul{
            text-decoration-color: black;
            color: white;
            padding: 10px;
        }
        ul li{
            display:inline;
            padding:10px;
            text-decoration:white;
            color: black;
        }
        ul li a{
            text-decoration: white;
            color: black;
            font-size: 95%;
            padding:50px;
        }
        ul li a:hover{
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
                margin-top: 150px;
            }  
            .box9 {
                height: 230px;
                width: 230px;
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
                .box9:nth-child(4) {
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
        <h1>ADMIN DASHBOARD</h1>
    </div>
    <div class="sidenav">
        <img src="images/employmelogos.png" id="logo"><br><br>
        <?php echo '<h3 style="text-align: center;"><big>Admin: '. $_SESSION["useradmin"] . '</big></h3>'; ?>
        <a class="active" style="text-decoration: none; font-size: 22px;" href="superdashboard.php"><span>DASHBOARD</span></a><br>
        <h3>JOBS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superviewjobs.php"><span>VIEW JOBS</span></a><br>
        <a style="text-decoration: none; font-size: 22px;" href="supermanagejobs.php"><span>MANAGE JOBS</span></a><br>
        <h3>USERS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superemployers.php"><span>EMPLOYERS</span></a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superjobseekers.php"><span>JOBSEEKERS</span></a><br>
        <h3>MANAGE PROFILE</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superprofile.php"><span>PROFILE</span></a><br>
        <h3>SETTINGS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superreports.php">REPORTS</a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superchangepassword.php">CHANGE PASSWORD</a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superaccountdetails.php">ACCOUNT DETAILS</a><br>
        <h3>EXIT</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superlogout.php"><span>LOG OUT</span></a><br>
    </div>

<div class="section">
     <div style="background-color: floralwhite;" class="sector">
        <div class="dissect">
            <?php echo '<h3 style="color:black; margin-left: -10px; margin-top: -3px;">Welcome,'. $_SESSION["useradmin"] . '</h3>'; ?>
        </div>
        <div class="dissect">
            <!-- (A) SEARCH FORM -->
                <form style="margin-left: -200px;" method="post" action="supersearch.php">
                <input style="font-size: 25px; border: 3px solid black;" type="text" name="search" placeholder="Search..." required>
                <input style="font-size: 25px; width: 150px; height: 45px; background-color: black; color: white;" type="submit" id="submit" name="submit" value="FIND JOBS">

</form>
        </div>
        <div class="dissect">
            <img style="margin-right:-100px; width:50px; height:50px;" src="images/admins.jpeg">
        </div>
        <div class="dissect">
            <?php echo '<h3 style="color:black; margin-right:20px;  margin-top: 9px;">'. $_SESSION["useradmin"] . '</h3>'; ?>
            <span style="color:black; margin-right:50px; " id="txt"></span>  
            <span style="color:black; margin-right:50px; " id="txt2"></span> 
        </div>
</div>
<div class="box-container9">

                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; margin-left: -25px; text-align: center;">JOBS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 45px;" src="images/jobss.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 25px; background-color:white;"><a style="text-decoration:none; color: black;" href="superviewjobs.php"><h2>VIEW</h2></a></button>
                    </div>
                </div>
                <div class="box box9 ">
                    <div style="margin-left: 35px; align-content:center;" class="text">
                         <h3 style="margin-left: -45px; margin-top:-25px;">JOBS</h3>
            <?php

include('database.php');

$sql="SELECT * FROM postjob ORDER BY ename";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($conn);
?>
                    </div>
                </div>
                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; margin-left: -25px; text-align: center;">JOBS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 45px;" src="images/jobss.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 25px; background-color: white;"><a style="text-decoration:none; color: black;" href="supermanagejobs.php"><h2>MANAGE</h2></a></button>
                    </div>
                </div>
            </div>
            <div class="box-container9">

                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; margin-left: -25px; text-align: center;">EMPLOYERS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 45px;" src="images/employer.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 25px; background-color:white;"><a style="text-decoration:none; color: black;" href="superemployers.php"><h2>MANAGE</h2></a></button>
                    </div>
                </div>
                <div class="box box9 ">
                    <div style="margin-left: 85px; align-content:center;" class="text">
                         <h3 style="margin-left: -95px; margin-top:-25px;">EMPLOYERS</h3>
            <?php

include('database.php');

$sql="SELECT * FROM empregister ORDER BY ename";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($conn);
?>
                    </div>
                </div>
                 <div class="box box9 ">
                    <div style="margin-left: 85px; align-content:center;" class="text">
                         <h3 style="margin-left: -95px; margin-top:-25px;">JOBSEEKERS</h3>
            <?php

include('database.php');

$sql="SELECT * FROM jsregister ORDER BY jsname";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($conn);
?>
                    </div>
                </div>
                <div class="box box9 ">
                    <div class="text">
                        <h3 style="margin-top:-25px; margin-left: -25px; text-align: center;">JOBSEEKERS</h3>
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 45px;" src="images/jobseekers.jpg">
                        <button style="width:150px; height:50px; margin-top: 20px; margin-left: 25px; background-color: white;"><a style="text-decoration:none; color: black;" href="superjobseekers.php"><h2>MANAGE</h2></a></button>
                    </div>
                </div>
            </div>

</div>
<div class="footer">
    
        <div class="favour"> 
            <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="superaccountdetails.php"><h2>Account Details</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="supermanagejobs.php"><h2>Manage Jobs</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superviewjobs.php"><h2>View Jobs</h2></a>
      </div>
      <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="superjobseekers.php"><h2>Job Seekers</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superemployers.php"><h2>Employers</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superprofile.php"><h2>Profile</h2></a>
      </div>
      <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="superchangepassword.php"><h2>Change Password</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="superreports.php"><h2>Reports</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="logout.php"><h2>Log Out</h2></a>
      </div>
  </div>
        <p style="color:black;"><big>EmployMe &copy; 2023 || All Rights Reserved.</big></p>
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