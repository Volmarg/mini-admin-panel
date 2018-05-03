<?php
include_once '../../common/php/dataInputs.php';

#check the provided codes
$form=new codeForm();
$status=$form->existsInBase();

#If everything ok then save
if($status=='true'){
  $status=$form->saveInDatabase();
}

#Redirect Back
header("HTTP/1.1 301 Moved Permanently");
header("Location: /?status=$status");

?>
