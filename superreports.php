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
    <title>Reports</title>
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
  background-color: orange;
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
.dissect{
    flex: 33.33%;
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
                padding-top: 250px;
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
                font-size: 28px;

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
 <div class="header">
    <h1>Reports</h1>
</div>
<div class="sidenav">
        <img src="images/employmelogos.png" id="logo"><br><br>
        <?php echo '<h3 style="text-align: center;"><big>Admin: '. $_SESSION["useradmin"] . '</big></h3>'; ?>
        <a style="text-decoration: none; font-size: 22px;" href="superdashboard.php"><span>DASHBOARD</span></a><br>
        <h3>JOBS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superviewjobs.php"><span>VIEW JOBS</span></a><br>
        <a style="text-decoration: none; font-size: 22px;" href="supermanagejobs.php"><span>MANAGE JOBS</span></a><br>
        <h3>USERS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superemployers.php"><span>EMPLOYERS</span></a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superjobseekers.php"><span>JOBSEEKERS</span></a><br>
        <h3>MANAGE PROFILE</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superprofile.php"><span>PROFILE</span></a><br>
        <h3>SETTINGS</h3>
        <a class="active" style="text-decoration: none; font-size: 22px;" href="superreports.php">REPORTS</a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superchangepassword.php">CHANGE PASSWORD</a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superaccountdetails.php">ACCOUNT DETAILS</a><br>
        <h3>EXIT</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superlogout.php"><span>LOG OUT</span></a><br>
</div>

<div class="section">
    <h2 style="text-align: center; padding-top:50px;">REPORTS</h2>
<div class="box-container9">

                <div class="box box9 ">
                    <div class="text">
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 85px;" src="images/employer.jpg">
                        <button style="width:150px; height:80px; margin-top: 20px; margin-left: 60px; font-size: 15px; background-color:white;"><a style="text-decoration:none; color: black;" href="superemployerreports.php"><h2>EMPLOYERS REPORTS</h2></a></button>
                    </div>
                </div>
                <div class="box box9 ">
                    <div class="text">
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 85px;" src="images/jobseekers.jpg">
                        <button style="width:150px; height:80px; margin-top: 20px; margin-left: 60px; font-size: 15px; background-color:white;"><a style="text-decoration:none; color: black;" href="superjobseekerreports.php"><h2>JOBSEEKERS REPORTS</h2></a></button>
                    </div>
                </div>
                <div class="box box9 ">
                    <div class="text">
                        <img style="width: 100px; height: 100px; margin-top: -30px; margin-left: 85px;" src="images/jobss.jpg">
                        <button style="width:150px; height:80px; margin-top: 20px; margin-left: 60px; font-size: 15px; background-color:white;"><a style="text-decoration:none; color: black;" href="superjobreports.php"><h2>JOBS REPORTS</h2></a></button>
                        
  
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
</body>
</html>