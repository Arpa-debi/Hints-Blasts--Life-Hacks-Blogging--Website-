<?php

include ("../../Model/User/Connection.php");

if(isset($_GET['deletedid'])){
	$id=$_GET['deletedid'];
    $DB= new Database();
    $con=$DB->connect();
	$sql = "delete from customerreg where id=$id";
	$result =mysqli_query($con , $sql);
	if($result){
		header('location:../../Controller/Admin/Customer.php');

	}else{
			die(mysqli_error($con));

	}
}

?>