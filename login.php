<?php

session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "lexita_db";
   
   include("functions.php");


if( !$con=mysqli_connect($dbhost,$dbuser, $dbpass, $dbname))
{

	die("failed to connect!");
}



   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
   	  //something was posted
   	  $txtEmail = $_POST['address'];
   	  $txtPass = $_POST['psw'];
   	  if(!empty($txtEmail) && !empty($txtPass))
   	  {
   	  	//read from database
   	  	
   	  	$query = "select * from tblUsers where email = '$txtEmail' limit 1";
   	  	$result = mysqli_query($con, $query);
   	  	if($result)
   	  	{
   	  		if($result && mysqli_num_rows($result) > 0)
   	  		{
   	  			$user_data = mysqli_fetch_assoc($result);
					 
   	  			if($user_data['password']===$txtPass)
   	  			{
                    echo "successful login";
   	  				$_SESSION['user_id'] = $user_data['user_id'];
   	  				header("Location:  about.html");
   	  				die;
   	  			}
   	  		}
   	  	}
	
   	  	echo"Wrong username or password!";
    
		 }
   } 

    

?>