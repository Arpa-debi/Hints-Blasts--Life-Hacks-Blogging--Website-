<?php 
include ("../../View/User/Header.php");
include ("../../Model/User/connection.php");
include ("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");
include("../../Model/User/edit_infoDB.php");

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
   
  if($_SERVER['REQUEST_METHOD']=="POST"){
  $info=new edit_info();
   $edit=$info->info($id);
}
 }
 else{
    header("location:../../View/User/login.php");
    die();
   }
 }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Information</title>
	<link href="../../View/User/edit_user.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>



	<div class="container">
		<div class="left">
      <?php 
               $image="";
               if(file_exists($user_data['profile_image'])){
                 $image=$user_data['profile_image'];

               }
              

            ?>
			<img id="img1"src="<?php echo $image ?>">
			<h2><?php echo $_SESSION['userName'];?></h2><br>
            <h4><a href="../../View/User/user_profile.php">Profile</a></h4>
            <h4><a href="../../View/User/user_profile_information.php">My Information</a></h4>
            <h4><a href="../../Controller/User/user_pass_change.php">Change Password</a></h4>
            
		</div>
		 <div class="right">
         <form method="post">
        	  <h2>Edit Information</h2><br><br>
            <label>First Name : </label><input type="text" id="fname" name="fnamee" value="<?php echo $_SESSION['fName'];?>" required="">
            <label>Last Name : </label><input type="text" id="lname" name="lnamee" value="<?php echo $_SESSION['lName'];?>" required=""><br><br>
            <label>E-mail : </label><input type="email" id="email" name="mail" value="<?php echo $_SESSION['mail'];?>"  required="">
            <label>Gender:</label><input id="gen" name="gen"  value="<?php echo $_SESSION['gender'];?>" required="" ><br>
            <button type="submit" class="update" name="submit"><h1>Save</h1></button><br><br>
         
			</form>
		</div>
		
	</div>

</body>
</html>