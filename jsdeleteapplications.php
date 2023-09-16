<?PHP

//start session
session_start();

require_once("database.php");
if(isset($_GET['appid'])){


//Creating and running mysqli query
$sql = "DELETE FROM jobapplication WHERE appid='$_GET[appid]'";
$query = mysqli_query($conn, $sql);

if($query){
  //Code to run when job application is deleted
	echo("<script language='javascript'>window.alert('Job application deleted successfully!');window.location='jsviewapplications.php';</script>");
}else{
  //Error to show when can't delete job application
	echo("<script language='javascript'>window.alert('Sorry Can't delete!');window.location='jsviewapplications.php';</script>");
}
}
?>