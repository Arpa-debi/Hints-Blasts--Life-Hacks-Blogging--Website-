<?php 
include ("../../Model/User/connection.php");
include ("../../Model/User/loginDB.php");
include ("../../Controller/User/login_validation.php");

$email= "";
if($_SERVER['REQUEST_METHOD']=='POST')
{
   

    $login=new login();
    $result=$login->log($_POST);

     if($result != "")
     {
        
     }
     else{
      
     }
$email=$_POST['email'];


}






?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login in to Hints Blasts</title>
        <link href="log.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <style>
          
.error {color: #FF0000;}
</style>
 
    </head>
    <body>



        <div class="login-form">
            <div class="containers">
                <div class="log-box">
        



                    <form method="post" action="">
                      <div class="logo"><img src="../../images/logo.png"></div>
                      <div class="titlee"><h1>Login<h1></div><br>

                      <p><input type="email"  id="email" name="email" placeholder="Email" required="" 
                        value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie']; } ?>"> 

                        <span class="error"><?php echo $EmailErr;?></span></p>

                      <p> <input type="password" id="pass" name="pass" placeholder="Password" required="" 
                      value="<?php if(isset($_COOKIE['passcookie'])){ echo $_COOKIE['passcookie']; } ?>"  >

                       <span class="error"><?php echo $PassErr;?></span></p>

                      <input type="checkbox"  name="remember" class="cbox" <?php $set_remember="checked='checked'" ; ?> ><span>Remember me</span>
                      <button type="submit" class="sub-log"><h1>Log In</h1></button><br>
                      <div class="forg"><a href="#">Forget Password?</a></div>
                    </form>
                    <br>
                    <hr>
                    <p class="or">or</p>
                    <div class="icons">
                    <h5>Login With Social Media</h5><br>
                    <img src="../../images\google.png">
                    <img src="../../images\fb3.png">
                    <img src="../../images\instra.jpg">
                    <div class="agree"><br><h6>By continuning,you agree to Hints Blasts <b>Terms of Service,Privacy Policy</b></h6></div>
                    </div> 
                    <div class="do-reg">Don't have an account?<a href="registration.php">Register Here</a></div>
                 
               </div>                                  
           </div>
       </div>

     </body>
</html>