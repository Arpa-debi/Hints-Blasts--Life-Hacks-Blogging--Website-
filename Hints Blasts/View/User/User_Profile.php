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
	<title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="../../View/User/User_Profile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
 
  <?php include 'Header.php'?>
	<div class="container">
		<div class="left">
			<img  src="../../images\logo.png">
			<h1>My Account</h1>
            <h4><a href="../../View/User/user_profile.php">Profile</a><h4>
            <h4><a href="../../View/User/user_profile_information.php">My Information</a><h4>
            <h4><a href="../../Controller/User/user_pass_change.php">Change Password</a><h4>
            
            
		</div>
		 <div class="right">
         <form method="post" action="" enctype="multipart/form-data">
         <div class="upload">
            <?php 
               $image="";
               if(file_exists($user_data['profile_image'])){
                 $image=$user_data['profile_image'];

               }

            ?>
         	<img style="margin-top:5%;border:5px solid #d0d9f7;border-radius:50%; height:200px" src="<?php echo $image ?>">
            <p style="font-size:30px;"><?php echo $_SESSION['userName'];?> </p>
            <p style="color:#999; size:10px;font-size:15px;"><?php echo $_SESSION['fName']." ".$_SESSION['lName'];?></p>
            
         	<a href="../../View/User/changePropic.php"><p style="color:blue;font-size:11px;">Change  profile Picture</p></a>
          
          </div>
       </form>
         <br><br>
         <div>
        <form>
   <table id="search">
    <tr>
        <td><img id="img1" src="<?php echo $image ?>"></td>
        <td><a href="../../View/User/post blog.php"><textarea placeholder="  Write your blog..."></textarea></a></td>
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
         <div class="info">
            <hr>
          <h1>Your Posted Blogs</h1>
                    
       
        
           <?php 

           if($posts){
            foreach ($posts as $ROW) {
                // code...
                $user=new User();
                
                $ROW_USER=$user->get_users($ROW['userid']);
                 include("../../View/User/post.php");
            }
           }
           
       
       ?>

  </div>
         
         </div>
			
		</div>
		
	</div>
</div>


</body>
</html>