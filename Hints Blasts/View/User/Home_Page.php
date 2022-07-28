<?php 
session_start();
include ("../../View/User/Header.php");
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
   $posts=$post->get_all_posts();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hints Blasts</title>
     <link href="Home Page.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<div class="container" >
    


<header id="header"><img id="header-img" src="../../images\logo.png"> 
</header>
    
    <div>
        <form method="post" action="search.php">
   <table id="search">
    <tr>
                    <?php 
               $image="";
               if(file_exists($user_data['profile_image'])){
                 $image=$user_data['profile_image'];

               }

            ?>
        <td><a href="../../View/User/User_Profile.php"><img id="img1" src="<?php echo $image ?>"></a></td>
        <td><a href="../../View/User/post blog.php"><textarea placeholder="  Write your blog..."></textarea></a></td>
            <td><input class="search" type="text" required name="search" id="search" placeholder="Search here"  >  </td> 
        <td>  <button type="button" class="button" id="button">SEARCH</button></td>
       </tr>

        </form>  
    </div>  
    <div>
        <form>
            <table>
                <tr>
        <td>
            <i id="i1"class="fa fa-image" style="font-size:30px;color:#56e8b6;"></i></td>
           <td> <i id="i2" class="fa fa-camera"style="font-size:30px;color:#56e8b6;"></i></td>
            <td><i id="i3" class="fa fa-video-camera"style="font-size:30px;color:#56e8b6;"></i></td>
            </table> 
    </tr>
</table>
</form>
</div>
<div class="box-container" >
   
     <?php 
           if($posts){
            foreach ($posts as $ROW) {
                // code...
                $user=new User();
                
                $ROW_USER=$user->get_users($ROW['userid']);
                 include("../../View/User/home.php");
            }
           }
           
       
       ?>
    <div id="box-5"> <img id="about" src="../../images\7.jpg"> <p id="T5">Hi there! Welcome to hints blasts. We are here to help you find the daily life hacks in almost every category.You can also share your own hacks here.We are here to make your life more simple.</p><a id="story" href="../../View/User/AboutUs.php">Read Our Story--></a>
    </div>
</div>
</div>
</body>
</html>