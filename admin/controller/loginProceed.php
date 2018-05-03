<?php

include_once('../model/loginData.php');

#create login class access
$login=new loginControll();

#Decide if user login or logout
if($_GET['logout']=='true'){
  #Destroy session if loggedOut
  $login->destroySession();

  #redirect
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: ../login.php");

}else{
  #Login
  $user=$_POST['Login'];
  $password=$_POST['password'];
  $login->getIn($user,$password);
}

?>
