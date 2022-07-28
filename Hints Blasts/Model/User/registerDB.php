<?php
class register{
function reg(){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$password=$_POST['pass'];
$uname=$_POST['uname'];
    $userid=$this->create_userid();
      $DB= new Database();
      $con=$DB->connect();
      $reg="select * from customerreg where UserName='$uname'";
           $result=mysqli_query($con,$reg);
				$num=mysqli_num_rows($result);
				if($num==1){
					echo "<script>alert('user name already taken')</script>";
				}
else{

	$query="insert into customerreg ( userid,FirstName,LastName,Email,Gender,Password,UserName) values ('$userid','$fname','$lname','$email','$gender','$password','$uname')";
    
          

$DB->save($query);
header("location:../../View/User/login.php");
}
}
private function create_userid(){
	$length=rand(4,19);
	$number="";
	for($i=0;$i<$length;$i++){
		$new_rand=rand(0,9);
		$number=$number.$new_rand;
	}
	return $number;
}
}
?>