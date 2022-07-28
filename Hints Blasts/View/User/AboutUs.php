<?php 
session_start();
include ("Header.php");
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

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>about US UI</title>
	
	<link href="AboutUs.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body 
			<?php include 'Header.php' ?>

  
	<div class="container">
		<div class="nav">
		</div>
		<div class="about-us">
			<div class="who-we-are">
				<h3>Who we are</h3>
				<span>A web developer  who is specializes in, or is specifically engaged in, the development of World Wide Web applications using a client–server model.</span>
			</div>
			<div class="cards">
				<div class="card">
					<div class="card-img card-img1"></div>
					<div class="card-body">
						<h3>Arpa Debi</h3>
						<span>Web developer</span>
						<p>She is a web developer, graphic designer, video editor, writer, and entrepreneur. She likes to do her own stunts. You can find her on Twitter, Instagram and YouTube. Code + Candy is a blog about design</p>
					</div>
					</div>
			
			
			<div class="card">
					<div class="card-img card-img2"></div>
					<card class="card-body">
						<h3>Tasneem Islam Khan</h3>
						<span>Web developer</span>
						<p>She is a web developer, graphic designer, video editor, writer, and entrepreneur. She likes to do her own stunts. You can find her on Twitter, Instagram and YouTube. Code + Candy is a blog about design</p>
					</card>
				</div>
			
			<div class="card">
					<div class="card-img card-img3"></div>
					<card class="card-body">
						<h3>MahjaBin Khondokar</h3>
						<span>Web developer</span>
						<p>She is a web developer, graphic designer, video editor, writer, and entrepreneur. She likes to do her own stunts. You can find her on Twitter, Instagram and YouTube. Code + Candy is a blog about design</p>
					</card>
				</div>
			
			<div class="card">
					<div class="card-img card-img4"></div>
					<card class="card-body">
						<h3>Nowshin Sharmily</h3>
						<span>Web developer</span>
						<p>She is a web developer, graphic designer, video editor, writer, and entrepreneur. She likes to do her own stunts. You can find her on Twitter, Instagram and YouTube. Code + Candy is a blog about design</p>
					</card>
				</div>
		
			
		</div>
</div>
<?php include 'Footer.php' ?>
</body>
</html>