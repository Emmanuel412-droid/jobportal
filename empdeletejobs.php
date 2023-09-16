<?PHP


//start session
session_start();

require_once("database.php");
if(isset($_GET['jobuserid'])){


//Creating and running mysqli query
$sql = "DELETE FROM postjob WHERE jobuserid='$_GET[jobuserid]'";
$query = mysqli_query($conn, $sql);

if($query){
  //Code to run when employer is deleted
	echo("<script language='javascript'>window.alert('Job deleted successfully!');window.location='empmanagejobs.php';</script>");
}else{
  //Error to show when can't delete user
	echo("<script language='javascript'>window.alert('Sorry Can't delete!');window.location='empmanagejobs.php';</script>");
}
}
?>