<?php 
include ("../../View/User/Header.php");
include ("../../Model/User/connection.php");
include ("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");
include("../../Model/User/edit_passDb.php");


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
  $info=new edit_pass();
   $edit=$info->pass($id);
  echo $id;
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
	<title>Change Password</title>
	<link href="../../View/User/user_pass.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>


  <?php
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
       $pass = $newpass = $repass =  "";
        $passErr =$newErr = $reErr ="";
      }

      if (empty($_POST["pass"])) {
      $passErr = "";
      } else {
      $pass = validateInpute($_POST["pass"]);

     }
      if (empty($_POST["newpass"])) {
      $newErr = "";
      } else {
      $newpass = validateInpute($_POST["newpass"]);

     }
    if (empty($_POST["repass"])) {
    $reErr = "";
    } else {
    $repass = validateInpute($_POST["repass"]);

    }

    



function validateInpute($data){
$data = trim($data); 
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
//<script>alert("hacked")</script>
}


      ?>
 

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
            <h4><a href="../../View/User/user_pass_change.php">Change Password</a></h4>
            
		</div>
		 <div class="right">
            <form method="post">
        	  <h2>Change Password</h2><br><br><br>
            <label>Recent Password : </label><input type="text" id="pass" name="pass"  required=""><span class="error"><?php echo $passErr;?></span><br><br>
            <label>New Password : </label><input type="text" id="repass" name="repass"   required=""><span class="error"><?php echo $reErr;?></span><br>
            <button type="submit" class="new" name="new"><h1>Change</h1></button>
          
         </form>
			
		</div>
		
	</div>

</body>
</html>