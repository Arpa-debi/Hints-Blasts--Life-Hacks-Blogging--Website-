<?php
session_start();
ob_start();
class login{
public function log($data){



$email=$data['email'];
$password=$data['pass'];

 $DB= new Database();
          
$query="select * from customerreg where Email='$email' && Password='$password'";
    $result=$DB->read($query);
    if($result){
        $row=$result[0];
        
        if($password==$row['Password']){
            $_SESSION['userName']=$row['UserName'];
            $_SESSION['userId']=$row['userid'];
            $_SESSION['fName']=$row['FirstName'];
            $_SESSION['lName']=$row['LastName'];
            $_SESSION['mail']=$row['Email'];
           $_SESSION['gender']=$row['Gender'];
           $_SESSION['pass']=$row['Password'];


if(isset($_POST['remember'])){

            setcookie('emailcookie',$email,time()+86400);
            setcookie('passcookie',$password,time()+86400);

             
        }

          if($email=='ar@gmail.com'){
             header('location:../../Controller/Admin/customer.php');
          }
          else{
            header('location:../../View/User/User_Profile.php');
}


            
        }

else{
    echo "<script>alert('wrong password or email ')</script>";
    
}
}
else{
    echo "<script>alert('wrong password or email ')</script>";
}
}

public function check_login($id){
    $query="select userid from customerreg where userid='$id' limit 1";
    $DB=new Database();
    $result=$DB->read($query);
    if($result)
    {
      return true;
    }
    return false;
}

}
?>