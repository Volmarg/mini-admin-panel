<?php
include_once '../../common/php/databaseConnection.php';
session_start();

class database{

  function getData($login,$password){
    #encrypt password
    $hashedPass=sha1($password);

    #Search for user in DB
    $db=new askDatabase();
    $sql="SELECT * FROM `admin` WHERE `login`='$login' AND `password`='$hashedPass';";

    #Check if something is returned
    $check=$db->getDataFromDatabase($sql);
    $returned=count($check[0][0][0]);

    #Decide if user can login
    if($returned==1){
      $allow='true';
    }else{
      $allow='false';
    }

    return $allow;

  }

}

class encryption extends database{ #for tests only - use for debug

  function hash($password){
    echo sha1($password);
  }

}

class handleSession extends encryption{
    #Create session
    function addSession(){
      #set
      $_SESSION['login']='YES';

      #redirect
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ../../admin/index.php?acces=yes");
    }

    function destroySession(){
      $_SESSION['login']='NO';
    }
}

class loginControll extends handleSession{

  #login func
  function getIn($login,$password){
    #Get data from database
    $acces=$this->getData($login,$password);

    if($acces=='true'){
      #create login session
      $this->addSession();
    }else{
      #wrongCredential
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ../login.php?status=wrong");
    }

  }

}



?>
