<?php
/*

*/
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="view/styles/global.css">
    <link rel="stylesheet" href="view/styles/login.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Additional External Scripts !-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  </head>
  <body>

    <header class="Bar">
      &nbsp;
    </header>

<?php

  include_once 'view/loginPanel.php';

  $login=new \login\panel();
  $login->loginForm();
  $login->modal();
?>


  <header class="Bar lower">
    &nbsp;
  </header>

    <script src="view/modal.js"></script>

  </body>
</html>
