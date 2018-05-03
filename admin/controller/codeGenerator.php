<?php

include_once 'fileHandler.php';
include_once 'folderHandler.php';

class generate{

  var $controll='';
  var $files = '';
  var $generate='';

  function __construct(){
    $this->controll= new databaseHandle();
    $this->files = new fileHandler();
  }

  public function createCodes($amount){ #this function creates random codes to be then putted into database and used for printing

    $productSeries='not';
    $productCode='not';
    $codePack=array();
    $codes=array();

    #keep generating codes until they are unique and not found in database and untill all generating llops have been finished
    while($this->controll->existsInBase($productSeries,$productCode) && @$x<=$amount-1){

      for($x=0;$x<=$amount-1;$x++){

        # genereate product series - 10 numbers
        $productSeries=mt_rand(1000000000,9999999999);
        #generate product code - 15 numers
        $productCode=mt_rand(100000000000000,999999999999999);
        $codePack=[$productSeries,$productCode];

        #push codepack and reset it
        array_push($codes,$codePack);
        unset($codePack);
        $codePack=array();

      }

    }

    return $codes;
  }

  public function writeToFile($codeList){ #now write codes into the file
    $filepath=$this->files->createFile($codeList);
    return $filepath;
  }

  public function writeToDatabase($codeList){ #write codes in file to database
    $this->controll->saveToDatabase($codeList);
  }

}



?>
