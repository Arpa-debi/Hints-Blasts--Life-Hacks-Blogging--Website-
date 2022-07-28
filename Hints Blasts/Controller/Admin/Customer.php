<?php
   include ("../../Model/User/connection.php");
   error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Details</title>
	<link rel="stylesheet" type="text/css" href="../../View/Admin/customer.css">
    <script https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js></script>
</head>
<body>

	<?php include("../../View/Admin/dashboard_menu.php")?>
     <form action="../../Controller/Admin/Customer.php" method="get">
	<div class="container">
        <div> 
            <input type="text" name="search" class="search" placeholder="Search">
            <button class="btn">Search</button>
        </div>
        <div class="success"></div>
  
		<table class="table">
			<thead>
        <tr>
            <th>ID</th>
            <th>User Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Gender</th>
            <th>Password</th>
            <th>UserName</th>
            <th>Time</th>
            <th>Profile Image</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php
             
             $search =$_GET['search'];
             $sql = "select * from customerreg where FirstName like '%$search%' ";
             $DB= new Database();
             $con=$DB->connect();
             $result =mysqli_query($con , $sql);
             $count=$result->num_rows;
             if($count>0){

                while($row = mysqli_fetch_assoc($result)){
                    ?>


                    <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['userid'] ?></td>
                     <td><?php echo $row['FirstName'] ?></td>
                     <td><?php echo $row['LastName'] ?></td>
                     <td><?php echo $row['Email'] ?></td>
                     <td><?php echo $row['Gender'] ?></td>
                     <td><?php echo $row['Password'] ?></td>
                     <td><?php echo $row['UserName'] ?></td>
                     <td><?php echo $row['Time'] ?></td>
                     <td><?php echo $row['profile_image'] ?></td>
                     <td>
                         <button class="btn"><a href="../../Model/Admin/customer_Delete.php?deletedid=<?php echo $row['id']; ?>">Delete</a></button>
                     </td>
                    </tr>

              <?php  }
             }
         
            ?>

            
        </tbody>
			

		</table>
	</div>

</form>


<script src="../../Controller/User/search_ajax.js"></script>



</body>
</html>