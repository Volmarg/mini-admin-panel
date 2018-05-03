<?php
  # this file is used when user presses [create codes] in admin panel

  include_once '../codeGenerator.php';

  $codes = new generate();

  $codesPack=$codes->createCodes($_GET['amount']);           #generate codes
  $fileData=$codes->writeToFile($codesPack);            #write codes into the file
  $codes->writeToDatabase($codesPack);        #write codes into the file

  $path=$fileData[0];
  $name=$fileData[1];
  $fullUrl=$path;


  #get file for download
  $name='codes.txt';
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$name");
  header("Content-Type: application/octet-stream; ");
  header("Content-Transfer-Encoding: binary");

  readfile($fullUrl);
?>
