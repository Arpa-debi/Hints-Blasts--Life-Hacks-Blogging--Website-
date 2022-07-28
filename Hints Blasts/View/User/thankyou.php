<?php 


include ("../../Model/User/connection.php");
include ("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");



 if(!isset($_SESSION['userName']))
{
       header("Location:../../View/User/ login.php");
       die();
}

//check log in
if(isset($_SESSION['userId']))
{
   $id=$_SESSION['userId'];
   $login=new login();
   $result=$login->check_login($id);
   if($result){
     $user=new User();
    $user_data=$user->get_users($id);
   }
   else{
    header("location:../../View/User/login.php");
    die();
   }

   //collect post
   $post=new Post();
     $id=$_SESSION['userId'];
   $posts=$post->get_posts($id);
  
 
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thank You </title>

	<style >
	.container{
       margin-top:15% ;
	   text-align: center;
    }
    #thanks{

      height: 300px;  
    }

    h1{
       font-style: italic;
       color: green;
    }

	</style>
</head>
<body>
	 <?php include 'Header.php'?>
<div class="container">
	<img id="thanks" src="../../images\Tik.png">
	<h1>Thank you</h1>
	<h2>Your response has been submitted</h2>
</div>


</body>
</html>