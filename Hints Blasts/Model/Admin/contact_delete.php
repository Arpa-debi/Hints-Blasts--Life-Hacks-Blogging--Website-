<?php

include ("../../Model/User/Connection.php");

if(isset($_GET['deletedid'])){
	$id=$_GET['deletedid'];
     $DB= new Database();
              $con=$DB->connect();
	$sql = "delete from contact where id=$id";
	$result =mysqli_query($con , $sql);
	if($result){
		header('location:../../Controller/Admin/admin_contact.php');

	}else{
			die(mysqli_error($con));

	}
}

?>