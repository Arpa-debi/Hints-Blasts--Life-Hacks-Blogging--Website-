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
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> My Information</title>
	<link href="user_profile_information.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>


  <?php
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
       $pname = $fname = $lname = $email= $gender = $country= $city = $add = $no =  "";
        $pnameErr =$fnameErr = $lnameErr = $emailErr= $genErr = $couErr = $cityErr = $addErr = $noErr="";
      }

      if (empty($_POST["pname"])) {
      $pnameErr = "";
      } else {
      $pname = validateInpute($_POST["pname"]);

     }
      if (empty($_POST["fname"])) {
      $fnameErr = "";
      } else {
      $fname = validateInpute($_POST["fname"]);

     }
    if (empty($_POST["lname"])) {
    $lnameErr = "";
    } else {
    $lname = validateInpute($_POST["lname"]);

    }

    if (empty($_POST["email"])) {
      $emailErr = "";
      } else {
      $email = validateInpute($_POST["email"]);

      }
      if (empty($_POST["country"])) {
      $couErr = "";
      } else {
      $country = validateInpute($_POST["country"]);

      }

      if (empty($_POST["city"])) {
      $cityErr = "";
      } else {
      $city = validateInpute($_POST["city"]);

      }

      if (empty($_POST["add"])) {
      $addErr = "";
      } else {
      $add = validateInpute($_POST["add"]);

      }
      if (empty($_POST["no"])) {
      $noErr = "";
      } else {
      $no = validateInpute($_POST["no"]);

      }


      if (empty($_POST["gender"])) {
      $genErr = "";
      } else {
      $gender= validateInpute($_POST["gender"]);

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
            <h4><a href="../../Controller/User/user_pass_change.php">Change Password</a></h4>
            
		</div>
		 <div class="right">
         
        	  <h2>My Information</h2><br><br>
            <label>First Name : </label><input type="text" id="fname" name="fnamee" value="<?php echo $_SESSION['fName'];?>" required=""><span class="error"><?php echo $fnameErr;?></span>
            <label>Last Name : </label><input type="text" id="lname" name="lnamee" value="<?php echo $_SESSION['lName'];?>" required=""><span class="error"><?php echo $lnameErr;?></span><br><br>
            <label>E-mail : </label><input type="email" id="email" name="mail" value="<?php echo $_SESSION['mail'];?>"  required=""><span class="error"><?php echo $emailErr;?></span>
            <label>Gender:</label><input id="gen" name="gen"  value="<?php echo $_SESSION['gender'];?>" required="" ><br><br>
            <h4><a href="../../Controller/User/edit_user_profile.php">Edit Information</a><h4>
         
			
		</div>
		
	</div>

</body>
</html>