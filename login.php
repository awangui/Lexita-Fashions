<?php

session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_database";
   
   include("functions.php");


if( !$con=mysqli_connect($dbhost,$dbuser, $dbpass, $dbname))
{

	die("failed to connect!");
}



   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
   	  //something was posted
   	  $user_name = $_POST['uname'];
   	  $password = $_POST['psw'];
   	  if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
   	  {
   	  	//read from database
   	  	
   	  	$query = "select * from users where user_name = '$user_name' limit 1";
   	  	$result = mysqli_query($con, $query);
   	  	if($result)
   	  	{
   	  		if($result && mysqli_num_rows($result) > 0)
   	  		{
   	  			$user_data = mysqli_fetch_assoc($result);
					 
   	  			if($user_data['password']===$password)
   	  			{
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