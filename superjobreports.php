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
    <title>Job Reports</title>
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
.nav{
    width: 100%;
    height: 90px;
    text-align: right;
    background-color: black;
    word-spacing: 3px;
    padding-top: 20px;
    padding-left: -80px;
    font-size: 25px;
}
.active{
    background-color: white;
}
.active:hover{
    color:red;
}
.section {
    height:1200px;
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
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
    background-color: lightgrey;
    border: 1px hidden;
    color: black;
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
    background-color:lightgrey;
    color: black;
    text-align: center;
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
    <h1>Job Reports</h1>
</div>
<div class="nav">
        <ul>
            <li class="active"><a href="superemployerreports.php">EMPLOYERS REPORTS</a></li>
            <li class="active"><a href="superjobseekerreports.php">JOBSEEKERS REPORTS</a></li>
            <li class="active"><a href="superreports.php">REPORTS</a></li>
        </ul>
    </div>
<div  style="padding-top: 20px;" class="section">
  <div class="sector">
    <div class="dissect">
        <input style="width: 500px; height: 30px; border:3px solid black; font-size: 28px;" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search according to employer name">
    </div>
    <!--<div class="dissect">
        <button style="width: 90px; height:50px;"><a style="text-decoration: none; color: black;" href="pdf3.php"><h2>PDF</h2></a></button>
    </div>-->
  </div>
<table style="width:1800px;" id="myTable">
                    <tr>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Employer Name</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Job User ID</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Job Title</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Industries</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Education</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Experience</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Salary</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Job Description</th>
                        <th style="height: 20px; color: blue; background-color: lightgreen;">Deadline</th>
                    </tr>
                    <tbody style="font-size: 28px;" id="geekss">
                    
                        <?php
                            include_once('database.php');
                            $sql = "SELECT * FROM postjob";

                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo 
                                "<tr>
                                    <td>".$row['ename']."</td>
                                    <td>".$row['jobuserid']."</td>
                                    <td>".$row['jobtitle']."</td>
                                    <td>".$row['industries']."</td>
                                    <td>".$row['education']."</td>
                                    <td>".$row['experience']."</td>
                                    <td>".$row['salary']."</td>
                                    <td>".$row['jobdescription']."</td>
                                    <td>".$row['deadline']."</td>
                                </tr>";
                                
                            }
                        ?>
                    </tbody>
                </table>
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