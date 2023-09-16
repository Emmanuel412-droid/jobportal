<?php

// Start the session
session_start();
// Check if jobseeker is logged in
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Jobs</title>
    <style>
        .body{
            width: 1900px;
            height: auto;
            margin: 0;
            font-family: "Lato", sans-serif;
            font-size: 20px;
            overflow-x: hidden;

        }
        .active{
            background-color: green;
        }
        .nav{
            width: 100%;
            height: 90px;
            text-align: right;
            color: black;
            word-spacing: 3px;
            font-size: 30px;
        }
        .section{
            width:900px;
            height:4000px;
            margin-left: 450px;
            font-size: 28px;
            padding: 0px 10px;
            background-color: navajowhite;

        }
table{
    margin: 0 auto;
    font-size: 25px;
    border: 1px hidden;
    width: 800px;
    height: 200px;
}
td{
    font-weight: bold;
    border: 1px hidden;
    padding: 10px;
    font-weight: lighter;
}
th{
    background-color: lightgreen;
    color: blue;
    font-weight: bold;
    border: 1px hidden;
    padding: 10px;
}
    </style>
</head>
<body>
    <div class="section">
        <div class="nav">
            <a style="text-decoration: none;" href="jsdashboard.php">DASHBOARD</a>
        
    </div>
    <table>
    <thead>
        <tr>
            <th>Employer Name</th>
            <th>Job Title</th>
            <th>Industries</th>
            <th>Job Description</th>
            <th>County</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('database.php');
        if (isset($_POST['search'])){
            $search = $_POST['search'];
            $query = mysqli_query($conn,"SELECT * FROM postjob WHERE ename like '%$search%'  or jobtitle like '%$search%' or industries like '%$search%' or jobdescription like '%$search%' or county like '%$search%'") or die(mysqli_error());
            while ($row = mysqli_fetch_array($query))

                {
                    ?>
                    <tr>
                        <td style="background-color: lightgrey; color: black; font-size: 28px;"><?php
                        echo $row['ename']; ?></td>
                        <td style="background-color: lightgrey; color: black; font-size: 28px"><?php
                        echo $row['jobtitle']; ?></td>
                        <td style="background-color: lightgrey; color: black; font-size: 28px"><?php
                        echo $row['industries']; ?></td>
                        <td style="background-color: lightgrey; color: black; font-size: 28px"><?php
                        echo $row['jobdescription']; ?></td>
                        <td style="background-color: lightgrey; color: black; font-size: 28px"><?php
                        echo $row['county']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
                        