<?php

  $email= $pass = "";
  $EmailErr=$PassErr="";
  
if($_SERVER["REQUEST_METHOD"]== "POST")
{

if (empty($_POST["email"])) {
$EmailErr = "Inforfation Required ";
} else {
$email= validateInpute($_POST["email"]);
}
if (empty($_POST["pass"])) {
$PassErr = "Information Required";
} else {
$pass = validateInpute($_POST["pass"]);


}

}

function validateInpute($data){
$data = trim($data); 
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
//<script>alert("hacked")</script>
}

?>