<?
@include_once '../config.php';
@include_once '../libs/model/databaseConnection.php';

class dataCollecting{

  function getCodes(){
    $databse=new askDatabase();
    $sql='SELECT * FROM `codes`';
    $fetched=$databse->getDataFromDatabase($sql);
    return $fetched;
  }


}


?>
