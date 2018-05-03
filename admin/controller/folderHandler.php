<?php

class folderHandler{

  public function listFiles(){

      $directory='../library/codes/';
      $files=scandir($directory);
      $filtered=array_values(array_diff($files, array('..', '.')));

      return $filtered;
  }

}

?>
