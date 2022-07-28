<?php 
include ("../../Model/User/connection.php");
include ("../../Model/User/registerDB.php");
$fname= "";
$lname= "";
$email= "";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $register=new register();
    $result=$register->reg($_POST);

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];


}
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Registration Form</title>
        <link href="../../View/User/reg.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
         <style>
         .error {color: #FF0000;}
        </style>

    </head>
    <body>
        
      

        <div class="registration">                                  
            <div class="container">

                <div class="left">
                    <img src="../../images\logo.png">
                    <p><br><div class="para1"><h1>Welcome To</h1> </div></p>
                    <div class="para2"> <h1>HINTS BLASTS</h1> </div><br><br>
                    <div class="para3"><h6 style="color: gray;">Do registration and be the member of hints blasts .Find  daily life solution and make your life easy and also  can share your own hacks  everyday</h6> </div>
                    <br><br><br><br><br>

                <div class="do-log">Already have an account?<a href="../../View/User/login.php">Login Here</a></div>
                </div>
                <div class="right">
                    <div class="reg-box">
                      <form method="post" action="" enctype="multipart/form-data" onsubmit="return validreg()" >

                            <div class="page-name"><h1>Register and Connect With Us</h1></div>
                            <div class="icons">
                                <img src="../../images\google.png">
                                <img src="../../images\fb3.png">
                                <img src="../../images\instra.jpg">
                            </div> 
                            <hr>
                            <p class="or">or</p>
                            <p><input type="text"  id="fname" name="fname" placeholder="First Name"  > </p>
                            <p><input type="text"  id="lname" name="lname" placeholder="Last Name" ></span></p>
                            <p><input type="email"  id="email" name="email" placeholder="E-mali" ></p>
                            <p><label  >Gender:</label>
                            <input type="radio" name="gender" id="gender" value="Male"><label >Male </label>
                            <input type="radio" name="gender" id="gender" value="Female"><label >Female </label>
                            <input type="radio" name="gender" id="gender" value="Others"><label >Others </label></p>
                            <p> <input type="Password" id="pass" name="pass" placeholder="Password" onkeyup='check();' ></p>
                            <p><input type="Password" id="repass" name="repass" placeholder="Re-Enter Password" onkeyup='check();' ></p>
                            <span id='message'></span>
                               <p><input type="text" id="uname" name="uname" placeholder="User Name"></p>
                                <button type="submit" class="sub-reg" name="submit"  ><h1>Register<h1></button><br><br>
                            <div class="policy"><br><h6>By registreting ,you agree to Hints Blasts <b>Terms of Service,Privacy Policy</b></h6><br>
                           
                    </form>
                    </div>
                </div>
                
            </div>
    </div>
     
<script>
    var check = function() {
  if (document.getElementById('pass').value ==
    document.getElementById('repass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

</script>


<script src="../../Controller/User/regs_validation.js"></script>
       </body>
</html>