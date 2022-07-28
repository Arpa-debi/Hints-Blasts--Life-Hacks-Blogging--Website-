<?php 
session_start();
include ("Header.php");
include ("../../Model/User/connection.php");
include ("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");

 if(!isset($_SESSION['userName']))
{
       header("Location: ../../View/User/login.php");
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
   $posts=$post->get_cooking_posts();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cooking Blogs</title>
    <link rel="stylesheet" type="text/css" href="cooking.css"/>
</head>
<body>
  <div class="container">
  	<div  class="image">
  		<img id ="img2"src="../../images/cooking_1200.jpg">
  	
  
  	<div class="right">
  		<h1>Cooking Blogs</h1>
  		<div>
  	 <?php 
           if($posts){
            foreach ($posts as $ROW) {
                // code...
                $user=new User();
                
                $ROW_USER=$user->get_users($ROW['userid']);
                 include("../../View/User/post_category.php");
            }
           }
           
       
       ?>
  
     </div>
   </div>
 </div>
</body>
</html>