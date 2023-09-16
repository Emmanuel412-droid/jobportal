<?PHP

//start session
session_start();

require_once("database.php");
if(isset($_GET['jsname'])){


//Creating and running mysqli query
$sql = "DELETE FROM jsregister WHERE jsname='$_GET[jsame]'";
$query = mysqli_query($conn, $sql);

if($query){
  //Code to run when employer is deleted
	echo("<script language='javascript'>window.alert('Account deleted successfully!');window.location='index.php';</script>");
}else{
  //Error to show when can't delete user
	echo("<script language='javascript'>window.alert('Sorry Can't delete!');window.location='jsdashboard.php';</script>");
}
}
?>