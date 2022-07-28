<?php
   include ("../../Model/User/connection.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Conatct Details</title>
	<link rel="stylesheet" type="text/css" href="../../View/Admin/postTable.css">
</head>
<body>

	<?php include("../../View/Admin/dashboard_menu.php")?>


  <div class="container">
		<table class="table">
			<thead>
        <tr>
            <th>ID</th>
            <th>Post ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

            <?php
              
              $DB= new Database();
              $con=$DB->connect();
              $sql = "select * from  contact ";
              $result =mysqli_query($con , $sql);
             
             if($result){

                while($row = mysqli_fetch_assoc($result)){
                    ?>


                    <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['contactid'] ?></td>
                     <td><?php echo $row['userid'] ?></td>
                     <td><?php echo $row['name'] ?></td>
                     <td><?php echo $row['email'] ?></td>
                     <td><?php echo $row['comment'] ?></td>
                     <td><?php echo $row['date'] ?></td>
                     <td>
                         <button class="btn"><a href="../../Model/Admin/contact_delete.php?deletedid=<?php echo $row['id']; ?>">Delete</a></button>
                     </td>
                    </tr>

              <?php  }
             }
         
            ?>
        </tbody>
			

		</table>
	
</div>



</body>
</html>