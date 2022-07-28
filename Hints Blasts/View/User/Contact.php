<?php 
include ("../../Model/User/connection.php");
include("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include ("../../Model/User/contactDB.php");
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
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $cont=new contact();
     $id=$_SESSION['userId'];
   $result=$cont->create_contact($id);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Us</title>
	<link href="Contact.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include 'Header.php' ?>
<form method="POST">
<div class="container1">
<img id="pic" src="../../images/Circle-icons-mail.svg.png">
<h1>Contact With<br> Us</h1>
<p>We would<br> love to<br> hear from you!</p>
</div>
<div class="container2">
	<level id="namee">Name </level><br><input type="text" id="name" name="name" placeholder="Enter name"  required=" "><br>
	<level id="mail">E-mail </level><br><input type="email" id="email" name="email" placeholder="Enter E-mali"  required=" "><br>
	<level id="com">Comment </level><br><textarea id="comment" name="comment" placeholder="Enter your comment"  required=" "></textarea> <br>
	<button type="submit" class="sub-log">Submit</button>

</div>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$myfile = fopen("contact.txt", "a+") or die("Unable to open file!");
fwrite($myfile,"\n\n");
fwrite($myfile,"Name\n\n");
fwrite($myfile,$name);
fwrite($myfile,"\n\n");
fwrite($myfile,"Email id\n\n");
fwrite($myfile, $email);
fwrite($myfile,"\n\n");
fwrite($myfile,"Submitted comment\n\n");
fwrite($myfile, $comment);
fwrite($myfile,"\n\n");
fclose($myfile);
}
?>



</body>

</html>