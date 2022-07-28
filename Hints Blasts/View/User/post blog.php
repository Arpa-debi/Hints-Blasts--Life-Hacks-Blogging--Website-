<?php
include("../../Model/User/connection.php");
include("../../Model/User/loginDB.php");
include("../../Model/User/userDB.php");
include("../../Model/User/postDB.php");
if(!isset($_SESSION['userName']))
{
       header("Location: ../../View/User/login.php");
       die();
}
//posting
if($_SERVER['REQUEST_METHOD']=="POST"){
    
   $post=new Post();
     $id=$_SESSION['userId'];
   $result=$post->create_post($id);
}

 
            
          
       


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Post Blog</title>
	<link href="post blog.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
     
</head>
<body>
	 
<div class="container2">
	<h1>Create Blog</h1><br>
	<hr>
     <form method="post" action="" enctype="multipart/form-data">
	
	<select name="write"id="blog" >
    <option  name="write" value ="blog">Select catagory</option>
	<option  name="write" value ="Traveling">Traveling</option>
	<option  name="write" value ="Tech">Tech</option>
	<option  name="write" value ="Cooking">Cooking</option>
	<option  name="write" value ="Others">Others</option>
</select>

        	<textarea  id="write" name="postt" placeholder="Write your blog..."  required=" "></textarea><br>
            <table> <br>
                  
            <input type="file" name="fileName" id="file" style="margin-left:30%;"><br><br>
            </table> 
    </tr>
</table>
<input type="submit"  name="post" class="post-log"value="post now">
</div>
</form>

</body>
</html>