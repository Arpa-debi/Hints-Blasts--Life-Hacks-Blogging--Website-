<?php
class edit_pass{

    public function pass($id)
    {
$pass=$_POST['pass'];
$repass=$_POST['repass'];
            $DB= new Database();
      $con=$DB->connect();
      $query="select * from customerreg where Password='$pass'";
    $result=$DB->read($query);
    if($result){
         $query="update customerreg set Password='$repass' where userid='$id'";

            $DB->save($query);
             header("location:../../View/User/User_Profile.php");
        }

            else{
                    echo "<script>alert('wrong password')</script>";
                }
    
}
}

?>