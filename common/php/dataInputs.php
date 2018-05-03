<?php
include_once 'databaseConnection.php';

class validators{

    public function existsInBase(){
      #Prepare Vars
      $serial=$_POST['kod1'];
      $security=$_POST['kod2'];

      #Connect
      $db=new askDatabase();
      $sql="SELECT `id` FROM `codes` WHERE `serial`='$serial' AND `security`='$security' AND `uzyty`='0';";
      #Check if this number is in DB
      $fetch=$db->getDataFromDatabase($sql);
      $grabbedCodes=$fetch[0][0][0];

      $numStatus=is_numeric($grabbedCodes);

      #Decide if code should be added
      if($numStatus==true){

        #Now get sure if the code is used or not

        $status='true';
      }elseif($numStatus==false){
        $status='false';
      }

      return $status;
    }

    public function beenUsed($serial,$security){
      #Connect
      $db=new askDatabase();

      $sql="SELECT `uzyty` FROM `codes` WHERE `serial`='$serial' AND `security`='$security';";

		.
		.
		.
		.

      #now return the information back
      if($status=='0'){
        $decide='true';
      }elseif($status=='1'){
        $decide='false';
      }

      return $decide;

    }
}

class codeForm extends validators{

  public function saveInDatabase(){
    $db=new askDatabase();

		.
		.
		.
		.
    }

  }
  }
?>
