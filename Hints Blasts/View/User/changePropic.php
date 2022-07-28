<?php
include("../../Model/User/connection.php");
include("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");
if(!isset($_SESSION['userName']))
{
       header("Location:../../View/User/login.php");
       die();
}
   //change pro pic
    
    if(isset($_POST['submit'])){
        // echo $_FILES['fileName']['name'];
        // echo $_FILES['fileName']['tmp_name'];
        $fileName = $_FILES['fileName']['name'];
        $tmp_loc = $_FILES['fileName']['tmp_name'];
        $uploadLoc = '../../uploads/'.$fileName;
        if(!empty($fileName) ){
            move_uploaded_file($tmp_loc, $uploadLoc);
            }
            if(file_exists($uploadLoc)){
            
                $id=$_SESSION['userId'];
                $user=new User();
                $user_data=$user->get_users($id);
                $userid=$user_data['userid'];
                $query="update customerreg set profile_image='$uploadLoc' where userid='$userid'";
                $DB= new Database();
                $DB->save($query);

                header("location:../../View/User/User_Profile.php");
            }
                    }
                    else{
                        echo "select a file";
                    }
       
   

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>change picture</title>
	<style>
	body{
	background-color: #d0d9f7;
}
#upload{
	background: #8ad1b9;
	width: 20%;
	height: 3vh;
	margin-left: 40%;
}
#file{
	margin-top: 20%;
	margin-left: 40%;
}
</style>
</head>
<body>

<form method="post" action="" enctype="multipart/form-data">
	<input type="file" name="fileName" id="file"><br><br>

          <button type="submit" id="upload"  name="submit" >Upload</button><br><br>
          
         </form>
</body>
</html>