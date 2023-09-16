<?php
// Start the session
session_start();
// Check if employer is logged in
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
    <title>Manage Interviews</title>
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
    height:8000px;
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
  
  text-align: center;
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
 table{
    margin: 0 auto;
    font-size: 25px;
    border: 1px hidden;
    height: 200px;
}
td{
    background-color: lightgreen;
    color: blue;
    font-weight: bold;
    border: 1px hidden;
    padding: 10px;
    text-align: center;
    font-weight: lighter;
}
th{
    font-weight: bold;
    border: 1px hidden;
    padding: 10px;
    text-align: center;
    background-color: white;
    color: black;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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
         
    </style>
</head>
<body>
 <div class  ="header">
    <h1>Manage Interviews</h1>
</div>
<div class="sidenav">
    <img src="images/employmelogos.png" id="logo">
    <?php echo '<h3 style="text-align: center;"><big>Employer: '. $_SESSION["useremployer"] . '</big></h3>'; ?>
    <a style="text-decoration: none; font-size: 22px;" href="empdashboard.php">DASHBOARD</a><br>
    <h3>JOBS</h3>
    <a style="text-decoration: none; font-size: 22px" href="emppostjobs.php">POST JOBS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanagejobs.php">MANAGE JOBS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empapplications.php">APPLICATIONS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageapplications.php">MANAGE APPLICATIONS</a><br>
    <a class="active" style="text-decoration: none; font-size: 22px;" href="empinterviews.php">MANAGE INTERVIEWS</a><br>
    <h3>MANAGE PROFILE</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empmanageprofile.php">PROFILE</a><br>
    <h3>SETTINGS</h3>
    <a style="text-decoration: none; font-size: 22px;" href="empreports.php">REPORTS</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empchangepassword.php">CHANGE PASSWORD</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="empaccountdetails.php">ACCOUNT DETAILS</a><br>
    <h3>EXIT</h3>
    <a style="text-decoration: none; font-size: 22px;" href="emplogout.php">LOG OUT</a><br>
</div>

<div class="section">
<table style="width:1650px; padding-top:50px;"> 
<tr>
<td><b>Employer Name</b></td>
<td><b>Interview ID</b></td>
<td><b>Job Title</b></td>
<td><b>Jobseeker Name</b></td>
<td><b>Interview Date</b></td>
<td><b>Start Time</b></td>
<td><b>End Time</b></td>
<td><b>Location</b></td>
<td><b>Contact</b></td>
<td><b>Action</b></td>
<td><b>Delete</b></td>

</tr>
<?php //code for read data from Database
include("database.php");

    $ret = "SELECT * FROM scheduleinterview WHERE ename=?";
    $stmt2 = $conn->prepare($ret);
    $stmt2->execute(array($_SESSION["useremployer"]));
     $res=$stmt2->get_result();
       while($row=$res->fetch_object())
      {
?>
<tr>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->ename;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->interviewid;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->jobtitle;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->jsname;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->interviewdate;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->starttime;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->endtime;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->location;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px;"><?php echo $row->contact;?></td>
<td style="height:150px; color: black; background-color:lightgrey;"><button><a style="font-size: 28px; text-decoration: none;" href="empeditinterviews.php?interviewid=<?php echo $row->interviewid;?>"><big>Edit</big></a></button></td>
<td style="color: black; background-color:lightgrey;"><button><a style="font-size: 28px; text-decoration: none;" href="empdeleteinterviews.php?interviewid=<?php echo $row->interviewid;?>"><big>Delete</big></a></button></td>
</tr>
<?php  } ?>
</table>
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
</body>
</html>