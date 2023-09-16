<?php 

// Start the session
session_start();
// Check if the admin is logged in
if (!isset($_SESSION['useradmin'])) {
    // Redirect the admin to the login page
    header('Location: login.php');
    exit;
}
include("database.php");

//approve
if(isset($_POST['approve'])){
    $status=$_POST['status'];
    $name=$_POST['name'];

    $sql="UPDATE postjob SET status = '$status' WHERE jobuserid = '$name'";

    $result = mysqli_query($conn, $sql);
    if($result){
            
                echo("<script language='javascript'>window.alert('Approved Successfully!');window.location='supermanagejobs.php';</script>");
                
                exit();
            }else{
                echo("<script language='javascript'>window.alert('Not approved!');window.location='supermanagejobs.php';</script>");
            }
        }
    


//reject
if(isset($_POST['reject'])){
    $status=$_POST['status'];
    $name=$_POST['name'];

    $sql="UPDATE postjob SET status = '$status' WHERE jobuserid = '$name'";

    $result = mysqli_query($conn, $sql);
    if($result){
                echo("<script language='javascript'>window.alert('Rejected Successfully!');window.location='supermanagejobs.php';</script>");
                
                exit();
            }else{
                echo("<script language='javascript'>window.alert('Not rejected!');window.location='supermanagejobs.php';</script>");
            }
        }
    

?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Manage Jobs</title>
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
.section {
    height:17000px;
    margin-left: 260px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    background-color:floralwhite;
}
 table{
    margin: 0 auto;
    font-size: 25px;
    border: 1px hidden;
    height: 200px;
}
td{
    background-color: lightgreen;
    border: 1px hidden;
    color: blue;
    font-weight: bold;
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
    <h1>Manage Jobs</h1>
</div>
<div class="sidenav">
        <img src="images/employmelogos.png" id="logo"><br><br>
        <?php echo '<h3 style="text-align: center;"><big>Admin: '. $_SESSION["useradmin"] . '</big></h3>'; ?>
        <a style="text-decoration: none; font-size: 22px;" href="superdashboard.php"><span>DASHBOARD</span></a><br>
        <h3>JOBS</h3>
        <a style="text-decoration: none; font-size: 22px;" href="superviewjobs.php"><span>VIEW JOBS</span></a><br>
        <a class="active" style="text-decoration: none; font-size: 22px;" href="supermanagejobs.php"><span>MANAGE JOBS</span></a><br>
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
    <input style="width: 500px; height: 30px; border:3px solid black; margin-top:20px; font-size: 28px;" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search according to employer name">
<table style="width: 1650px; padding-top: 20px;" id="myTable">
<tr>
<td><b>Employer Name</b></td>
<td><b>Job User ID</b></td>
<td><b>Job Title</b></td>
<td><b>Industries</b></td>
<td><b>Job Description</b></td>
<td><b>Action</b></td>
<td><b>Delete</b></td>
</tr>
<tbody id="geekss">
<?php //code for read data from Database
include("database.php");
    $ret = "SELECT * FROM postjob";
    $stmt2 = $conn->prepare($ret);
    $stmt2->execute();
     $res=$stmt2->get_result();
       while($row=$res->fetch_object())
      {
?>
<tr>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->ename;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->jobuserid;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->jobtitle;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->industries;?></td>
<td style="width: 600px; color: black; background-color:lightgrey; font-size: 28px"><?php echo $row->jobdescription;?></td>
<td style="color: black; background-color:lightgrey; font-size: 28px">
<?php
$stat=$row->status;
if($stat<4){
    ?>
<form action="" method="post">
    <input type="hidden" name="status" value="5">
    <input type="hidden" name="name" value="<?php echo $row->jobuserid;?>" >
    <input style="width: 90px; height: 50px; font-size: 20px;" type="submit" value="Approve" name="approve">
</form>
    
    <br><br>
<form action="" method="post">
    <input type="hidden" name="status" value="10">
    <input type="hidden" name="name" value="<?php echo $row->jobuserid;?>" >
    <input style="width: 90px; height: 50px; font-size: 20px;" type="submit" value="Reject" name="reject">
</form>
    


<?php
}else if($stat==5){
    ?>
    <p style="color: green; font-size:28px;">Approved</p>
    <?php
}
else if($stat==10){
    ?>
    <p style="color: red; font-size:28px;">Rejected</p>
    <?php
}
?>

</td>
<td style="color: black; background-color:lightgrey;"><button><a style="width: 90px; height: 50px; text-decoration: none; margin-top: 20px; font-size: 25px;" style="text-decoration: none;"href="superdeletejobs.php?jobuserid=<?php echo $row->jobuserid;?>">Delete</a></button></td>
</tr>
<?php } ?>
</tbody>
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