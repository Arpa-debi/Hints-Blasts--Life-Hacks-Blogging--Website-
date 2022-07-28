<?php
class contact{
function create_contact($id){
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
    $contactid=$this->create_contactid();
      $DB= new Database();
      $con=$DB->connect();
      $reg="select * from contact where email='$email'";
           $result=mysqli_query($con,$reg);
	$query="insert into contact ( contactid,userid,name,email,comment) values ('$contactid','$id','$name','$email','$comment')";
    
         $DB->save($query);
         header("location:../../View/User/thankyou.php");

}
private function create_contactid(){
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