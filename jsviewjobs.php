<?php

// Start the session
session_start();
// Check if the jobseeker is logged in
if (!isset($_SESSION['userjobseeker'])) {
    // Redirect the jobseeker to the login page
    header('Location: jslogin.php');
    exit;

}
?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>View Jobs</title>
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
  background: lightgreen;
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
  color: red;
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
.section {
    height:18000px;
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
    background-color: floralwhite;
}
 table{
    margin: 0 auto;
    font-size: 25px;
    border: 1px hidden;
    color: yellow;
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
    <h1>View Jobs</h1>
</div>
<div class="sidenav">
    <img src="images/employmelogos.png" id="logo"><br><br>
    <?php echo '<h3 style="text-align: center;"><big>Jobseeker: '. $_SESSION["userjobseeker"] . '</big></h3>'; ?>
    <a style="text-decoration: none; font-size: 22px;" href="jsdashboard.php"><span>DASHBOARD</span></a><br>
    <h3>JOBS</h3>
    <a class="active" style="text-decoration: none; font-size: 22px" href="jsviewjobs.php"><span>VIEW JOBS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="jsmanagejobs.php"><span>MANAGE JOBS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="jsviewapplications.php"><span>VIEW APPLICATIONS</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="jsshortlist.php"><span>SHORTLISTED CANDIDATES</span></a><br>
    <h3>SETTINGS</h3>
    <a style="text-decoration: none; font-size: 22px;" href="jsmanageprofile.php"><span>PROFILE</span></a><br>
    <a style="text-decoration: none; font-size: 22px;" href="jschangepassword.php">CHANGE PASSWORD</a><br>
    <a style="text-decoration: none; font-size: 22px;" href="jsaccountdetails.php"><span>ACCOUNT DETAILS</span></a><br>
    <h3>EXIT</h3>
    <a style="text-decoration: none; font-size: 22px;" href="jslogout.php"><span>LOG OUT</span></a><br>
</div>

<div class="section">
    <input style="width: 500px; height: 30px; border:3px solid black; margin-top:20px; margin-left: -950px; font-size: 28px;" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search according to employer name">
<table style="padding-top: 20px;" id="myTable">
<tr>
<td><b>Employer Name</b></td>
<td><b>Job Title</b></td>
<td><b>Industries</b></td>
<td><b>Education</b></td>
<td style="width: 30px;"><b>Experience<br>(Years)</b></td>
<td><b>Salary<br>(Monthly Kes)</b></td>
<td style="width: 800px;"><b>Job Description</b></td>
<td><b>Deadline</b></td>
<td><b>County</b></td>
<td><b>Town</b></td>
</tr>
<tbody id="geekss">
<?php //code for read data from Database
include("database.php");
    $ret = "SELECT * FROM postjob where status=5";
    $stmt2 = $conn->prepare($ret);
    $stmt2->execute();
     $res=$stmt2->get_result();
       while($row=$res->fetch_object())
      {
?>
<tr>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->ename;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->jobtitle;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->industries;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->education;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->experience;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->salary;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->jobdescription;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->deadline;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->county;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->town;?></td>
</tr>
<?php  } ?>
</tbody>
</table>
</div>
<div class="footer">
    <div class="favour">
        <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="jsviewjobs.php"><h2>View Jobs</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="jsmanagejobs.php"><h2>Manage Jobs</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="jsviewapplications.php"><h2>View Applications</h2></a>
        </div>
        <div class="difav">
        <a style="color: black; text-decoration:none; padding-top:20px" href="jsmanageprofile.php"><h2>Profile</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="jschangepassword.php"><h2>Change Password</h2></a>
        <a style="color: black; text-decoration:none; padding-top:20px" href="jsshortlist.php"><h2>Shortlisted Candidates</h2></a>
        </div>
    </div>
<p style="color:black;"><big>EmployMe &copy; 2023 || All Rights Reserved.</big></p>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>