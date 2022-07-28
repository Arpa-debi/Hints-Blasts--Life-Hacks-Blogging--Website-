<?php
session_start();
class edit_info{

    public function info($id)
    {

            $fnamee=$_POST['fnamee'];
$lnamee=$_POST['lnamee'];
$mail=$_POST['mail'];
$gen=$_POST['gen'];
            $DB=new Database();
            $query="update customerreg set FirstName='$fnamee', LastName='$lnamee', Email='$mail', Gender='$gen' where userid='$id'";
            $DB->save($query);
            if($query) {
$_SESSION['fName'] = $_POST['fnamee'];
$_SESSION['lName']=$_POST['lnamee'];
            $_SESSION['mail']=$_POST['mail'];
            $_SESSION['gender']=$_POST['gen'];
header("location:../../Controller/User/edit_user_profile.php");
            
die();
}

                 
    
        }
    
}

?>