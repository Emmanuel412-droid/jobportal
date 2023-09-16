<?PHP


//start the session
session_start();

require_once("database.php");
if(isset($_GET['jsid'])){


//Creating and running mysqli query
$sql = "DELETE FROM jsregister WHERE jsid='$_GET[jsid]'";
$query = mysqli_query($conn, $sql);

if($query){
  //Code to run when jobseeker is deleted
	echo("<script language='javascript'>window.alert('Jobseeker deleted successfully!');window.location='superjobseekers.php';</script>");
}else{
  //Error to show when can't delete user
	echo("<script language='javascript'>window.alert('Sorry Can't delete!');window.location='superjobseekers.php';</script>");
}
}
?>