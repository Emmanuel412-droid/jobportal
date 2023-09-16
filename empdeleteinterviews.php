<?PHP


//start session
session_start();

require_once("database.php");
if(isset($_GET['interviewid'])){


//Creating and running mysqli query
$sql = "DELETE FROM scheduleinterview WHERE interviewid='$_GET[interviewid]'";
$query = mysqli_query($conn, $sql);

if($query){
  //Code to run when interview is deleted
	echo("<script language='javascript'>window.alert('Interview deleted successfully!');window.location='empinterviews.php';</script>");
}else{
  //Error to show when can't delete user
	echo("<script language='javascript'>window.alert('Sorry Can't delete!');window.location='empinterviews.php';</script>");
}
}
?>