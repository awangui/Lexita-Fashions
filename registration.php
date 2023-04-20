<?php
$dbuser = "root";
$dbpass = "";
$dbname = "lexita_db";

$con = mysqli_connect("localhost","$dbuser","$dbpass","$dbname");

if( !$con=mysqli_connect("localhost",$dbuser, $dbpass, $dbname))
{

	die("failed to connect!");
}

$txtName = $_POST['fname'];
$txtEmail = $_POST['address'];
$txtSurname = $_POST['sname'];
$txtPass = $_POST['psw'];
$sql = "INSERT INTO `tblUsers` (`Id`, `firstName`, `surname`, `email`, `password`) VALUES ('0', '$txtName', '$txtSurname', '$txtEmail', '$txtPass')";
//insert into database
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Contact Records Inserted";
    
}
else{
    echo"registration  failed";
}
?>