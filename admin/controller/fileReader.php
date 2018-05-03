<?
include_once 'fileHandler.php';

$file=new databaseHandle();
$file->saveToDatabase();

header("HTTP/1.1 301 Moved Permanently");
header("Location: admin/index.php");
?>
