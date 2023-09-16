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
    <title>Account Details</title>
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
      .favour {
  display: flex;
}
/* Create  equal columns that sits next to each other */
.difav{
    flex: 33.33%;
    padding: 5px;
    color: black;
    text-align: center;
}
 table{
    margin: 0 auto;
    font-size: 25px;
    border: hidden;
    height: 200px;
}
td{
    background-color: lightgreen;
    border: hidden;
    color: blue;
    font-weight: bold;
    padding: 10px;
    text-align: center;
    font-weight: lighter;
}
th{
    font-weight: bold;
    border: hidden;
    padding: 10px;
    text-align: center;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.footer {
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    height: auto;
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
         
    </style>
</head>
<body>
 <div class  ="header">
    <h1>Account Details</h1>
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
        <a style="text-decoration: none; font-size: 22px;" href="superreports.php">REPORTS</a><br>
        <a style="text-decoration: none; font-size: 22px;" href="superchangepassword.php">CHANGE PASSWORD</a><br>
        <a class="active" style="text-decoration: none; font-size: 22px;" href="superaccountdetails.php">ACCOUNT DETAILS</a><br>
        <h3>EXIT</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superlogout.php"><span>LOG OUT</span></a><br>
</div>

<div class="section">
<table style="width:1600px; padding-top:400px;">
<tr>
<td><b>Admin Name</b></td>
<td><b>Phone Number</b></td>
<td><b>Email</b></td>
<td><b>Gender</b></td>
<td><b>County</b></td>
<td><b>Action</b></td>
</tr>
<?php //code for read data from Database
include("database.php");

    $ret = "SELECT * FROM superadmin WHERE aname=?";
    $stmt2 = $conn->prepare($ret);
    $stmt2->execute(array($_SESSION["useradmin"]));
     $res=$stmt2->get_result();
     $cnt=1;
       while($row=$res->fetch_object())
      {
?>
<tr>
<td style="height:150px; color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->aname;?></td>
<td style="height:150px; color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->phonenumber;?></td>
<td style="height:150px; color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->email;?></td>
<td style="height:150px; color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->gender;?></td>
<td style="height:150px; color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->county;?></td>
<td style="height:150px; color: black; background-color:lightgrey;"><button style="width: 80px;"><a style="font-size: 28px; text-decoration: none;" href="supereditregister.php?aname=<?php echo $row->aname;?>"><big>Edit</big></a></button></td>
</tr>
<?php } ?>
</table>
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