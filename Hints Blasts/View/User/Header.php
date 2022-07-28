<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="../../View/User/Header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
<nav class="navbar" >
        <ul>
            <li><a href="../../View/User/Home_Page.php">Home<span>&#8595;</span> </a></li>           
              <li>
                <div class="dropdown">
                <button class="dropbtn">Category<span>&#8595;</span></button>
                <div class="dropdown-content">
                <a href="../../View/User/travellingpage.php">Travelling</a>
                <a href="../../View/User/tecpage.php">Tech</a>
                <a href="../../View/User/cookingpage.php">Cooking</a>
                <a href="../../View/User/Blogs.php">Others</a>
                 </div>
             </div>
             </li>
             <li><a href="../../View/User/AboutUs.php">  About Us<span>&#8595;</span> </a></li>
            <li><a href="../../View/User/Contact.php">  Contact<span>&#8595;</span> </a></li>
            <li><a href="../../View/User/User_Profile.php"class="fa fa-envelope" style="font-size:25px;color:#f731c6;margin-left:40vh;"></a></li>
             <li><a href="../../View/User/User_Profile.php"class="fa fa-user" style="font-size:25px;color:#f731c6;"></a></li>
             <li><a href="../../Model/User/logoutDB.php" class="fa fa-sign-out" style="font-size:25px;color:#f731c6;"></a></li>
        </ul>
        </nav>
    
</body>

</html>