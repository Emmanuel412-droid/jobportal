<?PHP


session_start();

require_once("database.php");
if(isset($_GET['empid'])){


//Creating and running mysqli query
$sql = "DELETE FROM empregister WHERE empid='$_GET[empid]'";
$query = mysqli_query($conn, $sql);

if($query){
  //Code to run when employer is deleted
	echo("<script language='javascript'>window.alert('Account deleted successfully!');window.location='index.php';</script>");
}else{
  //Error to show when can't delete user
	echo("<script language='javascript'>window.alert('Sorry Can't delete!');window.location='empdashboard.php';</script>");
}
}
?>