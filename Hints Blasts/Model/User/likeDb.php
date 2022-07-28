<?php
include ("../../Model/User/connection.php");
include ("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");

   $login=new login();
   $user=$login->check_login($_SESSION['userId']);

   

if(isset($_SERVER['HTTP_REFERER'])){

	$return_to = $_SERVER['HTTP_REFERER'];

}else{
	$return_to = "../../View/User/User_Profile.php";
}

if(isset($_GET['type']) && isset ($_GET['id'])){

	if(is_numeric($_GET['id'])){

		$allowed[] = 'post';
		$allowed[] = 'user';

		if(in_array($_GET['type'], $allowed)){

			$post = new Post();
			$post->like_post($_GET['id'],$_GET['type'],$_SESSION['userId']);

		}
		
	}
  
}
header("Location: ". $return_to);
die;